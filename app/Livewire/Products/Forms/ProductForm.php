<?php

namespace App\Livewire\Products\Forms;

use App\Models\Category;
use DeepL\Translator;
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
     * @var array
     */
    public array $name = [];

    /**
     * @var array
     */
    public array $slug = [];

    /**
     * @var array
     */
    public array $main_desc = [];

    /**
     * @var array
     */
    public array $features_desc = [];

    /**
     * @var array
     */
    public array $pros_desc = [];

    /**
     * @var array
     */
    public array $technical_desc = [];

    /**
     * @var array
     */
    public array $washing_desc = [];

    /**
     * @var array
     */
    public array $meta_title = [];

    /**
     * @var array
     */
    public array $meta_description = [];

    /**
     * @var array
     */
    public array $country_prices = [];

    /**
     * @var array
     */
    public array $categories = [];

    /**
     * @var array
     */
    protected $rules = [
        'name'                             => 'required',
        'slug'                             => 'required',
        'main_desc'                        => 'nullable',
        'features_desc'                    => 'nullable',
        'pros_desc'                        => 'nullable',
        'technical_desc'                   => 'nullable',
        'washing_desc'                     => 'nullable',
        'meta_title'                       => 'nullable',
        'meta_description'                 => 'nullable',
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
        $this->categories = $product->categories->pluck('id')->toArray();

        foreach (array_keys($this->except('product', 'categories', 'country_prices')) as $field) {
            foreach (array_keys(config('gearxpro.languages')) as $lang) {
                $this->{$field}[$lang] = $product->getTranslation($field, $lang, false);
            }
        }

        foreach($this->product->countries as $country) {
            $this->country_prices[$country->id] = [
                'wholesale_price' => $country->prices->wholesale_price,
                'price' => $country->prices->price
            ];
        }
    }

    public function updateSlug(string $lang)
    {
        $this->slug[$lang] = Str::kebab($this->name[$lang]);
    }

    public function updateCategories(Category $category)
    {
        if ($category->parent_id === null) {
            $this->categories = [$category->id];
        }
    }

    /**
     * @param array $cats
     */
    public function removeCategories(array $cats)
    {
        $this->categories = array_intersect($cats, $this->categories);
    }

    public function update()
    {
        $this->validate();

        $this->country_prices = array_filter($this->country_prices, fn($item) => !empty($item['wholesale_price']) || !empty($item['price']));

        // remove ids not exist in category table
        $this->categories = array_intersect($this->categories, Category::pluck('id')->toArray());

        foreach ($this->except(['country_prices', 'product', 'categories']) as $field => $values) {
            $this->product->replaceTranslations($field, $values);
        }
        $this->product->save();

        // convert empty values with null
        array_walk_recursive($this->country_prices, function(&$value) {
            $value = trim($value);
            if (empty($value)) {
                $value = null;
            }
        });

        if ($this->country_prices) {
            $this->product->countries()->sync($this->country_prices);
        }

        $this->product->categories()->sync($this->categories);
    }

    /**
     * @param string $lang
     * @throws \DeepL\DeepLException
     */
    public function translateAllFields(string $lang)
    {
        $translator = new Translator(env('DEEPL_API_KEY'));
        $dataLang = config('gearxpro.languages')[$lang];
        $defaultLang = config('app.locale');

        foreach (array_keys($this->except(['country_prices', 'product', 'categories'])) as $field) {
            $this->{$field}[$lang] = $translator->translateText(
                $this->{$field}[$defaultLang] ?? '',
                $defaultLang,
                $dataLang['trans_code'],
                [
                    'preserve_formatting' => true,
                    'tag_handling' => 'html',
                ]
            )->text;
        }
    }
}
