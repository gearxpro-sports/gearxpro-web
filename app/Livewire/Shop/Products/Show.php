<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Modals\ProductAddedToCart;
use App\Livewire\Shop\Navigation as ShopNavigation;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;


#[Layout('layouts.guest')]
class Show extends Component
{
    public Product $product;
    public ProductVariant $selectedVariant;
    public $images;
    public $variants = null;
    public $tabs = [];
    public $currentTab = 'product';

    public $selectedLength = null;
    public $selectedColor = null;
    public $selectedSize = null;

    public $selectedVariantQuantity;
    public $quantity = 1;
    //    public $selectedMoney = 0;

    public $cart;

    public $terms;

    public $allLengths = [];
    public $allColors = [];
    public $allSizes = [];

    public $lengths = [];
    public $colors = [];
    public $sizes = [];

    //    public $currency = [
    //        [
    //            'simbol' => '€',
    //            'name' => '(€) Euro'
    //        ],
    //        [
    //            'simbol' => '$',
    //            'name' => '($) Dollaro'
    //        ],
    //    ];

    public function mount(Product $product)
    {
        $this->product->load('variants');
        //        $this->selectedVariant = $this->product->variants->firstWhere('position', 1);
        //        $this->selectedLength = $this->selectedVariant->length->id;
        //        $this->selectedColor = $this->selectedVariant->color->id;
        //        $this->selectedSize = $this->selectedVariant->size->id;
        $reseller =
            Country::where('iso2_code', session('ip_country_code'))->first()->reseller ??
            User::role(User::RESELLER)->where('country_id', Country::where('iso2_code', session('ip_country_code'))->first()->id)->first()
        ;

        if(!$reseller) {
            return abort(404);
        }

        $this->variants = $reseller
            ->stocks()
            ->with('productVariant')
            ->where('product_id', $this->product->id)
            ->where('quantity', '>', 0)
            ->get();

        if(!$this->variants->count()) {
            return redirect()->route('shop.index');
        }

        $this->terms = collect();
        foreach ($this->variants as $stock) {
            if (!$stock->productVariant) {
                continue;
            }
            $this->terms = $this->terms->merge($stock->productVariant->terms);
        }


        $this->terms = $this->terms->groupBy('attribute_id');
        $this->terms = $this->terms->map(function ($t) {
            return $t->unique('id');
        });

        if (isset($this->terms[1])) {
            $this->allLengths = $this->terms[1]->sortBy('position')->keyBy('id')->map(function ($l) {
                return [
                    'id' => $l->id,
                    'value' => $l->value,
                    'color' => $l->color,
                ];
            });
        }
        if (isset($this->terms[2])) {
            $this->allColors = $this->terms[2]->sortBy('position')->keyBy('id')->map(function ($c) {
                return [
                    'id' => $c->id,
                    'value' => $c->value,
                    'color' => $c->color,
                ];
            });
        }
        if (isset($this->terms[3])) {
            $this->allSizes = $this->terms[3]->sortBy('position')->keyBy('id')->map(function ($s) {
                return [
                    'id' => $s->id,
                    'value' => $s->value,
                    'color' => $s->color,
                ];
            });
        }

        foreach ($this->variants as $stock) {
            if (!$stock->productVariant) {
                continue;
            }
            foreach ($stock->productVariant->getMedia('products') as $media) {
                $this->images[$stock->product->id] = $stock->productVariant->getMedia('products');
                $this->allColors->put($stock->productVariant->color->id, [
                    ...$this->allColors[$stock->productVariant->color->id], 'image' => $stock->productVariant->getFirstMediaUrl('products')
                ]);
            }
        }

        $this->lengths = count($this->allLengths) ? $this->allLengths->toArray() : [];
        $this->colors = count($this->allColors) ? $this->allColors->toArray() : [];
        $this->sizes = count($this->allSizes) ? $this->allSizes->toArray() : [];

        $this->getProductVariantImages();

        $this->tabs = [
            'product' => $this->product->name,
            'characteristics' => __('shop.products.characteristics'),
//            'advantages' => __('shop.products.advantages'),
//            'technicality' => __('shop.products.technicality'),
//            'wash' => __('shop.products.wash')
        ];
    }

    protected function getProductVariantImages()
    {
        $this->images[$this->product->id] = $this->variants->where('productVariant.position', 1)->first() !== null ? $this->variants->where('productVariant.position', 1)->first()->productVariant->getMedia('products') : $this->variants->first()->productVariant->getMedia('products');
    }

    protected function filterVariantsByTerm($type, $id)
    {
        $this->selectedLength = $this->selectedLength ?? null;
        $this->selectedColor = $this->selectedColor ?? null;
        $this->selectedSize = $this->selectedSize ?? null;

        if ($type === 'length') {
            $this->selectedLength = $id;
        }
        if ($type === 'color') {
            $this->selectedColor = $id;
        }
        if ($type === 'size') {
            $this->selectedSize = $id;
        }

        $reseller =
            Country::where('iso2_code', session('ip_country_code'))->first()->reseller ??
            User::role(User::RESELLER)->where('country_id', Country::where('iso2_code', session('ip_country_code'))->first()->id)->first()
        ;

        $variants = $reseller->stocks()->with('productVariant')->where('product_id', $this->product->id);

        if ($this->selectedColor) {
            $variants->whereHas('productVariant.terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedColor);
            });
        }
        if ($this->selectedSize) {
            $variants->whereHas('productVariant.terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedSize);
            });
        }
        if ($this->selectedLength) {
            $variants->whereHas('productVariant.terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedLength);
            });
        }

        $this->variants = $variants->get();
        $this->images = [];
        foreach ($this->variants as $stock) {
            if (!$stock->productVariant) {
                continue;
            }
            foreach ($stock->productVariant->getMedia('products') as $media) {
                if (!array_key_exists($stock->productVariant->product->id, $this->images)) {
                    $this->images[$stock->productVariant->product->id] = $stock->productVariant->getMedia('products');
                    $this->allColors->put($stock->productVariant->color->id, [
                        ...$this->allColors[$stock->productVariant->color->id], 'image' => $stock->productVariant->getFirstMediaUrl('products')
                    ]);
                }
            }
        }
        if ($this->variants->count() === 1) {
            $this->selectedVariant = $this->variants->first()->productVariant;
            $this->selectedVariantQuantity = $this->selectedVariant->stocks()->where('user_id', session('reseller_id'))->first()->quantity;
            $this->selectedLength = $this->selectedVariant->length?->id;
            $this->selectedColor = $this->selectedVariant->color?->id;
            $this->selectedSize = $this->selectedVariant->size?->id;
        }
    }

    protected function processTerms($terms, $id)
    {
        if (isset($terms[$id])) {
            return $terms[$id]->sortBy('position')->keyBy('id')->map(function ($term) {
                return [
                    'id' => $term->id,
                    'value' => $term->value,
                    'color' => $term->color,
                ];
            })->toArray();
        }
    }

    public function setLength($id)
    {
        $this->filterVariantsByTerm('length', $id);
        $this->recalculateTerms();
    }

    public function setColor($id)
    {
        $this->filterVariantsByTerm('color', $id);
        $this->recalculateTerms();
    }

    public function setSize($id)
    {
        $this->filterVariantsByTerm('size', $id);
        $this->recalculateTerms();
    }

    public function resetAll()
    {
        $this->reset(['selectedColor', 'selectedSize', 'selectedLength', 'selectedVariant', 'quantity', 'selectedVariantQuantity']);
        $this->filterVariantsByTerm('length', $this->selectedLength);
        $this->filterVariantsByTerm('color', $this->selectedColor);
        $this->filterVariantsByTerm('size', $this->selectedSize);

        $this->recalculateTerms();

        $this->getProductVariantImages();

        $this->dispatch('reset-selection');
    }

    private function recalculateTerms(): void
    {
        $terms = collect();

        foreach ($this->variants as $stock) {
            if (!$stock->productVariant) {
                continue;
            }
            $terms = $terms->merge($stock->productVariant->terms);
        }

        $terms = $terms->groupBy('attribute_id');

        $this->lengths = $this->processTerms($terms, 1);
        $this->colors = $this->processTerms($terms, 2);
        $this->sizes = $this->processTerms($terms, 3);
    }

    //    #[On('selectMoney')]
    //    public function selectMoney($money)
    //    {
    //        $this->selectedMoney = $money;
    //    }

    public function increment()
    {
        if (isset($this->selectedVariant) && $this->quantity < $this->selectedVariantQuantity) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        if (auth()->check()) {
            $cart = auth()->user()->cart ?? auth()->user()->cart()->create();
        } else {
            if (!session()->get('cart_user_token')) {
                session()->put('cart_user_token', Str::random(10));
            }
            $cart = Cart::firstOrCreate([
                'user_id' => session('cart_user_token')
            ]);
        }


        $variant_in_cart = $cart->items()->where('product_variant_id', $this->selectedVariant->id)->first();

        if ($variant_in_cart) {
            $variant_in_cart->increment('quantity', $this->quantity);
        } else {
            $cart->items()->create([
                'product_variant_id' => $this->selectedVariant->id,
                'price' => $this->selectedVariant->product->price,
                'quantity' => $this->quantity
            ]);
        }

        $this->dispatch('product-added-to-cart', $this->selectedVariant->id, $this->quantity)->to(ProductAddedToCart::class);
        $this->dispatch('product-added-to-cart')->to(ShopNavigation::class);

        $this->resetAll();
    }

    // TODO: Pay with Link
    public function payWithLink()
    {
        dd("Pay with Link");
    }

    #[On('reset-selection')]
    public function render()
    {
        return view('livewire.shop.products.show', [
            //            'mostPurchased' => Stock::with('productVariant')->get()->shuffle()->take(1)
        ]);
    }
}
