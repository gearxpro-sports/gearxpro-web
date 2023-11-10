<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Components\SectionButton;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('layouts.guest')]
class Index extends Component
{
    //public $product;
    public $color;
    public $size;


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
     * @var int|null
     */
    public ?int $selectedCategory;

    /**
     * @var bool
     */
    public bool $filtersOpen = false;

    public function mount()
    {
        $this->currentCountry = Country::with('reseller')->where('iso2_code', session('country_code'))->first();
        $this->orderOptions = [
            'price_low'  => __('shop.products.price_low'),
            'price_high' => __('shop.products.price_high'),
        ];
        // TODO: fermarsi al secondo livello?
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this->productAttributes = Attribute::with('terms')->get()->groupBy('id')->toBase();
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.shop.products.index');
    }

    public function loadProducts(array $filter = [])
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

        if ($filter) {
            switch ($filter['type']) {
                case 'category':
                    $products->whereHas('categories', function(Builder $query) use ($filter) {
                        $query->where('id', $filter['value']);
                    });
                    break;
            }
        }

        $products->select('products.*');

        $this->products = $products->get();

//        if ($filter) {
//            dd($this->products);
//        }

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
    public function selectCategory(int $categoryId) {
        $this->loadProducts(['type' => 'category', 'value' => $categoryId]);
        $this->selectedCategory = $categoryId;
    }

    public function resetCategory()
    {
        $this->selectedCategory = null;
        $this->loadProducts();
    }

    public function toggleFilters()
    {
        $this->filtersOpen = !$this->filtersOpen;
    }

    /*
    #[On('selectOrder')]
    public function selectOrder($index) {
        $this->selectedOrder = $index;
    }

    #[On('filterOn')]
    public function filterOn() {
        $this->filter = !$this->filter;
    }

    #[On('setFilter')]
    public function setFilter($type, $element) {
        $this->product = $element;
    }

    #[On('setColor')]
    public function setColor($color) {
        $this->color = $color;
    }

    #[On('setSize')]
    public function setSize($size) {
        $this->size = $size;
    }

    public function clearFilter() {
        $this->color = null;
        $this->size = null;
    }
    */
}
