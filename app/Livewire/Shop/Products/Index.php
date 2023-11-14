<?php

namespace App\Livewire\Shop\Products;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Term;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
    public array $productColorCounts;

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

    public function mount()
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this->currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();
        $this->orderOptions = [
            'price_low'  => __('shop.products.price_low'),
            'price_high' => __('shop.products.price_high'),
        ];
        $this->productAttributes = Attribute::with('terms')->get()->groupBy('id')->toBase();
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.shop.products.index');
    }

    public function loadProducts()
    {
        $this->productColorCounts = [];
        $products = Product::with([
                'categories' => function($query) {
                    $query->whereNull('parent_id');
                },
                'variants' => function($query) {
                    $query
                        ->without(['product', 'attributes'])
                        ->with(['terms' => function($query) {
                            $query->whereNotNUll('color')->select('terms.id');
                        }])
                    ;
                }
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

        if ($this->selectedColors) {
            $products->whereHas('variants.terms', function(Builder $query) {
                $query->whereIn('id', $this->selectedColors);
            });
        }

        if ($this->selectedSizes) {
            $products->whereHas('variants.terms', function(Builder $query) {
                $query->whereIn('id', $this->selectedSizes);
            });
        }

        $products->select('products.*');

        $this->products = $products->get();

        foreach ($this->products as $product) {
            if ($product->variants->count() > 0) {
                foreach ($product->variants as $variant) {
                    if ($variant->terms->count() > 0) {
                        $this->productColorCounts[$product->id][] = $variant->terms->first()->id;
                    }
                }
                if (isset($this->productColorCounts[$product->id])) {
                    $this->productColorCounts[$product->id] = count(array_unique($this->productColorCounts[$product->id]));
                }
            }
        }
    }

    #[On('selectCategory')]
    public function selectCategory(Category $category) {
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
