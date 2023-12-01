<?php

namespace App\Livewire\Shop\Products;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Term;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('layouts.guest')]
class Index extends Component
{
    /**
     * @var Model
     */
    public Model $currentCountry;

    /**
     * @var Collection
     */
    public Collection $categories;

    /**
     * @var Collection
     */
    public Collection $products;

    /**
     * @var array
     */
    public array $productColors;

    /**
     * @var array
     */
    public array $orderOptions = [];

    /**
     * @var string
     */
    public string $selectedOrder = 'price_low';

    /**
     * @var Collection
     */
    public Collection $productAttributes;

    /**
     * @var bool
     */
    public bool $filtersOpen = false;

    /**
     * @var Category|null
     */
    public ?Category $selectedCategory = null;

    /**
     * @var int|null
     */
    public ?int $selectedColorId = null;

    /**
     * @var int|null
     */
    public ?int $selectedSizeId = null;

    public function mount(Request $request)
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this->currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();
        $this->orderOptions = [
            'price_low'  => __('shop.products.price_low'),
            'price_high' => __('shop.products.price_high'),
        ];
        $this->productAttributes = Attribute::with('terms')->get()->groupBy('id')->toBase();

        if ($request->get('categoryId')) {
            $this->selectCategory($request->get('categoryId'));
        } else {
            $this->loadProducts();
        }
    }

    public function render()
    {
        return view('livewire.shop.products.index');
    }

    public function loadProducts() {
        $this->productColors = [];
        $products = Product::with([
                'categories' => function($query) {
                    $query->whereNull('parent_id');
                },
                'variants' => function($query) {
                    $query
                        ->without(['product', 'attributes'])
                        ->with(['media', 'terms' => function($query) {
                            $query->whereNotNUll('color');
                        }])
                        ->withTrashed()
                    ;
                },
            ])
            ->whereHas('stocks', function(Builder $query) {
                $query
                    ->select('product_id')
                    ->where('user_id', $this->currentCountry->reseller->id)
                    ->havingRaw('SUM(quantity) > 0')
                    ->groupBy('product_id')
                ;
            })
            ->whereHas('countries', function(Builder $query) {
                $query
                    ->where('country_id', $this->currentCountry->id)
                    ->where(function(Builder $query) {
                        $query
                            ->whereNotNull('wholesale_price')
                            ->whereNotNull('price')
                        ;
                    })
                ;
            })
        ;

        if ($this->selectedCategory) {
            $products->whereHas('categories', function(Builder $query) {
                $query->where('id', $this->selectedCategory->id);
            });
        }

        $this->products = $products->withTrashed()->get();

        if ($this->selectedColorId || $this->selectedSizeId) {

            $filters = array_filter([$this->selectedColorId, $this->selectedSizeId]);

            $this->products = $this->products->filter(function($product) use ($filters) {
                foreach ($product->variants_combinations_array as $termIds) {
                    if (count(array_intersect($filters, explode('-', $termIds))) === count($filters)) {
                        return true;
                    }
                }
                return false;
            });
        }

        foreach ($this->products as $product) {
            $stocks = Stock::with('productVariant')
                ->where('user_id', session('reseller_id'))
                ->whereIn('product_variant_id', $product->variants->pluck('id'))
                ->where('quantity', '>', 0)
                ->get()
            ;

            if ($stocks->count() > 0) {
                foreach ($stocks as $stock) {
                    $this->productColors[$stock->product_id][] = $stock->productVariant->color?->color;
                }
                $this->productColors[$stock->product_id] = array_unique($this->productColors[$stock->product_id]);
            }
        }
    }

    public function selectOrder($order) {
        $this->selectedOrder = $order;
    }

    #[On('selectCategory')]
    public function selectCategory($id) {
        $category = Category::find($id);

        if ($this->selectedCategory && $category->id === $this->selectedCategory->id) {
            if ($category->parent_id !== null) {
                $parent = $category->parent;
                $this->selectedCategory = $parent;
            } else {
                $this->resetCategory();
                return;
            }
        } else {
            $this->selectedCategory = $category;
        }
        $this->loadProducts();
    }

    public function resetCategory()
    {
        $this->selectedCategory = null;
        $this->loadProducts();
    }

    /**
     * @param Term $color
     */
    public function selectColors(Term $color)
    {
        $this->selectedColorId = $this->selectedColorId === $color->id ? null : $color->id;

        $this->loadProducts();
    }

    /**
     * @param Term $size
     */
    public function selectSizes(Term $size)
    {
        $this->selectedSizeId = $this->selectedSizeId === $size->id ? null : $size->id;

        $this->loadProducts();
    }

    public function toggleFilters()
    {
        $this->filtersOpen = !$this->filtersOpen;
    }

    public function clearFilters()
    {
        $this->selectedCategory = null;
        $this->selectedColorId = null;
        $this->selectedSizeId = null;
        $this->loadProducts();
    }
}
