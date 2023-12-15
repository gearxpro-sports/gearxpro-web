<?php

namespace App\Livewire\Products\Modal;

use App\Models\Product;
use DeepL\Translator;
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

        $translator = new Translator(env('DEEPL_API_KEY'));

        $name = $slug = [];
        foreach(config('gearxpro.languages') as $iso => $langData) {
            $name[$iso] = $translator->translateText($this->name, config('app.locale'), $langData['trans_code'])->text;
            $slug[$iso] = Str::kebab($name[$iso]);
        }

        $product = Product::create([
            'name' => $name,
            'slug' => $slug,
        ]);


        return redirect()->route('products.edit', ['product' => $product->slug]);

    }
}
