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
    protected $rules = [
        'name'             => 'required',
        'slug'             => 'required',
        'main_desc'        => 'nullable',
        'features_desc'    => 'nullable',
        'pros_desc'        => 'nullable',
        'technical_desc'   => 'nullable',
        'washing_desc'     => 'nullable',
        'meta_title'       => 'nullable',
        'meta_description' => 'nullable',
    ];

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;

        foreach (array_keys($this->rules) as $field) {
            $this->{$field} = $product->{$field};
        }
    }

    public function updateSlug()
    {
        $this->slug = Str::kebab($this->name);
    }
}
