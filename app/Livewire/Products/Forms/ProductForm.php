<?php

namespace App\Livewire\Products\Forms;

use Livewire\Form;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class ProductForm extends Form
{   
    /**
     * @var Product|null
     */
    public ?Product $product;

    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var string
     */
    public string $slug = '';
    
    /**
     * @var string
     */
    public string $main_desc = '';

    /**
     * @var string
     */
    public string $features_desc = '';

    /**
     * @var string
     */
    public string $pros_desc = '';

    /**
     * @var string
     */
    public string $technical_desc = '';

    /**
     * @var string
     */
    public string $washing_desc = '';

    /**
     * @var sting
     */
    public string $meta_title = '';

    /**
     * @var sting
     */
    public string $meta_description = '';

    /**
     * @var array
     */
    public array $country_prices = [];

    /**
     * @var array
     */
    protected $rules = [
        'name'                            => 'required',
        'slug'                            => 'required',
        'main_desc'                       => 'nullable',
        'features_desc'                   => 'nullable',
        'pros_desc'                       => 'nullable',
        'technical_desc'                  => 'nullable',
        'washing_desc'                    => 'nullable',
        'meta_title'                      => 'nullable',
        'meta_description'                => 'nullable',
        // TODO: Decidere se i prezzi devoo essere settati entrambi per nazione
        'country_prices.*.wholesale_price' => 'nullable|numeric',
        'country_prices.*.price'           => 'nullable|numeric',
    ];

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        foreach (array_keys($this->except('product')) as $field) {
            $this->{$field} = $product->{$field};
        }
    }

    public function updateSlug()
    {
        $this->slug = Str::kebab($this->name);
    }

    public function update()
    {
        $this->validate();

        $this->country_prices = array_filter($this->country_prices, fn($item) => !empty($item['wholesale_price']) || !empty($item['price']));

        $this->product->update(
            $this->except(['country_prices', 'product'])
        );

        if ($this->country_prices) {
            $this->product->countries()->sync($this->country_prices);
        }
        
    }
}
