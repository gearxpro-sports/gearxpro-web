<?php

namespace App\Livewire\Products\Modal;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class AddProduct extends ModalComponent
{
    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required',
    ];

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.products.modal.add-product');
    }

    public function save()
    {
        $this->validate();
        
        rescue(function() {
            $product = Product::create([
                'name' => $this->name, 
                'slug' => Str::kebab($this->name),
            ]);

            return redirect()->route('products.edit', ['product' => $product->id]);

        }, function () {
            session()->flash('error', __('Error!'));
        });

    }
}
