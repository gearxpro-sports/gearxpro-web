<?php

namespace App\Livewire\Shop\Products;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
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
     * @var array
     */
    public array $selectedColors = [];

    /**
     * @var array
     */
    public array $selectedSizes = [];

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
                        ->withTrashed()
                        ->without(['product', 'attributes'])
                        ->with(['media', 'terms' => function($query) {
                            $query->whereNotNUll('color');
                        }])
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

        if ($this->selectedColors || $this->selectedSizes) {
            $terms = array_merge($this->selectedColors, $this->selectedSizes);
            $products->whereHas('variants.terms', function(Builder $query) use ($terms) {
                $query->whereIn('id', $terms);
            }, '>=', count($terms));
        }

        $this->products = $products->withTrashed()->get();

        foreach ($this->products as $product) {
            if ($product->variants->count() > 0) {
                foreach ($product->variants as $variant) {
                    $this->productColors[$product->id][] = $variant->color?->color;
                }
                $this->productColors[$product->id] = array_unique($this->productColors[$product->id]);
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
        $this->clearFilters();
    }

    /**
     * @param Term $color
     */
    public function selectColors(Term $color)
    {
        if (in_array($color->id, $this->selectedColors)) {
            $this->selectedColors = array_diff($this->selectedColors, [$color->id]);
        } else {
            $this->selectedColors[] = $color->id;
        }

        $this->loadProducts();
    }

    /**
     * @param Term $size
     */
    public function selectSizes(Term $size)
    {
        if (in_array($size->id, $this->selectedSizes)) {
            $this->selectedSizes = array_diff($this->selectedSizes, [$size->id]);
        } else {
            $this->selectedSizes[] = $size->id;
        }

        $this->loadProducts();
    }

    public function toggleFilters()
    {
        $this->filtersOpen = !$this->filtersOpen;
    }

    public function clearFilters()
    {
        $this->selectedCategory = null;
        $this->selectedColors = [];
        $this->selectedSizes = [];
        $this->loadProducts();
    }
}
