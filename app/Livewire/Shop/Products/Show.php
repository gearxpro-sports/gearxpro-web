<?php

namespace App\Livewire\Shop\Products;

use App\Livewire\Modals\Cart as ModalCart;
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
    public ProductVariant $default;

    public $selectedLength = null;
    public $selectedColor = null;
    public $selectedSize = null;
    public $quantity = 1;
    public $selectedMoney = 0;
    public $cart;

    public $lengths = [];
    public $colors = [];
    public $sizes = [];
//    public $colors = [
//        [
//            'code' => 'black',
//            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
//            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
//        ],
//        [
//            'code' => 'green',
//            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
//            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
//        ],
//        [
//            'code' => 'blue',
//            'image-short' => 'resources/images/icons/SOXPro-mini-1.svg',
//            'image-long' => 'resources/images/icons/SOXPro-mini-1-long.svg',
//        ],
//
//    ];
//    public $sizes = [
//        'xs', 's', 'm', 'l', 'xl', 'xxl'
//    ];

    public $mostPurchased = [
        0 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        1 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        2 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        3 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        4 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        5 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
        6 => [
            'name' => 'SoXPro',
            'image' => 'SOXPro.png',
            'description' => 'SOXPro Trekking - Green',
            'availableColor' => '1',
            'price' => '29,00 - € 35,00'
        ],
    ];

    public $currency = [
        [
            'simbol' => '€',
            'name' => '(€) Euro'
        ],
        [
            'simbol' => '$',
            'name' => '($) Dollaro'
        ],
    ];

    public function mount() {
//        dd($this->product->variants()->with('terms')->where('terms.id', 1)->pluck('id'));
        $this->default = $this->product->variants->firstWhere('position', 1);
//        $this->selectedLength = $this->default->length->id;
//        $this->selectedColor = $this->default->color->id;
//        $this->selectedSize = $this->default->size->id;

        // Carica tutte le varianti associate a quel prodotto
        $this->product->load('variants');

        // Recupera i termini da ciascuna variante
        $terms = collect();
        foreach ($this->product->variants as $variant) {
            $terms = $terms->merge($variant->terms);
        }

        $terms = $terms->groupBy('attribute_id');
        $terms = $terms->map(function($t) {
            return $t->unique('id');
        });

        $this->lengths = $terms[1]->sortBy('position');
        $this->colors = $terms[2]->sortBy('position');
        $this->sizes = $terms[3]->sortBy('position');
    }

    #[On('selectMoney')]
    public function selectMoney($money) {
        $this->selectedMoney = $money;
    }

    public function addProduct()
    {
        $this->quantity++;
    }

    public function removeProduct()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    #[On('addToCart')]
    public function addToCart() {
        $this->cart[$this->product->id] = [
            'name' => $this->product->name,
            'format' => $this->format,
            'color' => $this->selectedColor,
            'size' => $this->selectedSize,
            'quantity' => $this->quantity,
            'price' => ($this->product->price * $this->quantity)
        ];

        $this->dispatch('modalInfoCart', $this->currency[$this->selectedMoney]['simbol'], $this->cart)->to(ModalCart::class);
        $this->dispatch('addProducts', $this->quantity)->to(ShopNavigation::class);
    }

    #[On('payForLink')]
    public function payForLink() {
        //TODO
    }

    public function render()
    {
        return view('livewire.shop.products.show');
    }
}
