<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Modals\ProductAddedToCart;
use App\Livewire\Shop\Navigation as ShopNavigation;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;


#[Layout('layouts.guest')]
class Show extends Component
{
    public Product $product;
    public ProductVariant $selectedVariant;
    public $variants = null;

    public $selectedLength = null;
    public $selectedColor = null;
    public $selectedSize = null;

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

    //    public $mostPurchased = [
    //        0 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        1 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        2 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        3 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        4 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        5 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //        6 => [
    //            'name' => 'SoXPro',
    //            'image' => 'SOXPro.png',
    //            'description' => 'SOXPro Trekking - Green',
    //            'availableColor' => '1',
    //            'price' => '29,00 - € 35,00'
    //        ],
    //    ];

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

    public function mount()
    {
        ray()->clearAll();
        $this->product->load('variants');
        //        $this->selectedVariant = $this->product->variants->firstWhere('position', 1);
        //        $this->selectedLength = $this->selectedVariant->length->id;
        //        $this->selectedColor = $this->selectedVariant->color->id;
        //        $this->selectedSize = $this->selectedVariant->size->id;

        $this->terms = collect();
        foreach ($this->product->variants as $variant) {
            $this->terms = $this->terms->merge($variant->terms);
        }

        $this->terms = $this->terms->groupBy('attribute_id');
        $this->terms = $this->terms->map(function ($t) {
            return $t->unique('id');
        });

        $this->allLengths = $this->terms[1]->sortBy('position')->keyBy('id')->map(function ($l) {
            return [
                'id' => $l->id,
                'value' => $l->value,
                'color' => $l->color,
            ];
        });
        $this->allColors = $this->terms[2]->sortBy('position')->keyBy('id')->map(function ($c) {
            return [
                'id' => $c->id,
                'value' => $c->value,
                'color' => $c->color,
            ];
        });
        $this->allSizes = $this->terms[3]->sortBy('position')->keyBy('id')->map(function ($s) {
            return [
                'id' => $s->id,
                'value' => $s->value,
                'color' => $s->color,
            ];
        });

        $this->lengths = $this->allLengths->toArray();
        $this->colors = $this->allColors->toArray();
        $this->sizes = $this->allSizes->toArray();
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

        $variants = $this->product->variants();

        if ($this->selectedColor) {
            $variants->whereHas('terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedColor);
            });
        }
        if ($this->selectedSize) {
            $variants->whereHas('terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedSize);
            });
        }
        if ($this->selectedLength) {
            $variants->whereHas('terms', function (Builder $query) {
                $query->where('terms.id', $this->selectedLength);
            });
        }

        $this->variants = $variants->get();
        if ($this->variants->count() === 1) {
            $this->selectedVariant = $this->variants->first();
            $this->selectedLength = $this->selectedVariant->length->id;
            $this->selectedColor = $this->selectedVariant->color->id;
            $this->selectedSize = $this->selectedVariant->size->id;
        }
    }

    protected function processTerms($terms, $id)
    {
        return $terms[$id]->sortBy('position')->keyBy('id')->map(function ($term) {
            return [
                'id' => $term->id,
                'value' => $term->value,
                'color' => $term->color,
            ];
        })->toArray();
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
        $this->reset(['selectedColor', 'selectedSize', 'selectedLength', 'selectedVariant', 'quantity']);
        $this->filterVariantsByTerm('length', $this->selectedLength);
        $this->filterVariantsByTerm('color', $this->selectedColor);
        $this->filterVariantsByTerm('size', $this->selectedSize);

        $this->recalculateTerms();

        $this->dispatch('reset-selection');
    }

    private function recalculateTerms(): void
    {
        $terms = collect();

        foreach ($this->variants as $variant) {
            $terms = $terms->merge($variant->terms);
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
        if($this->quantity < $this->selectedVariant->quantity) {
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
        $cart = auth()->user()->cart ?? auth()->user()->cart()->create();

        $variant_in_cart = $cart->items()->where('product_variant_id', $this->selectedVariant->id)->first();

        if($variant_in_cart) {
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
        return view('livewire.shop.products.show');
    }
}
