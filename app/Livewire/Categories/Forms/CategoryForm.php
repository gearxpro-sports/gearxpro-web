<?php

namespace App\Livewire\Categories\Forms;

use DeepL\DeepLException;
use DeepL\Translator;
use Livewire\Form;
use App\Models\Category;
use Livewire\Attributes\Rule;

class CategoryForm extends Form
{
    /**
     * @var Category|null
     */
    public ?Category $category;

    /**
     * @var array
     */
    public array $name = [];

    /**
     * @var array
     */
    public array $description = [];

    protected $rules = [
        'name'          => 'required',
        'description'   => 'nullable',
    ];

    /**
     * @param Category $category
     */
    public function setCategoryForm(Category $category)
    {
        $this->category = $category;

        foreach (array_keys($this->rules) as $field) {
            foreach (array_keys(config('gearxpro.languages')) as $lang) {
                $this->{$field}[$lang] = $category->getTranslation($field, $lang, false);
            }
        }
    }

    public function update()
    {
        $this->validate();

        foreach ($this->only(['name', 'description']) as $field => $values) {
            $this->category->replaceTranslations($field, $values);
        }

        $this->category->save();
    }

    /**
     * @param string $lang
     * @throws DeepLException
     */
    public function translateAllFields(string $lang)
    {
        $translator = new Translator(env('DEEPL_API_KEY'));
        $dataLang = config('gearxpro.languages')[$lang];
        $defaultLang = config('app.locale');

        foreach (array_keys($this->rules) as $field) {
            $this->{$field}[$lang] = $translator->translateText(
                $this->{$field}[$defaultLang] ?? '',
                $defaultLang,
                $dataLang['trans_code'],
                ['preserve_formatting' => true,]
            )->text;
        }
    }
}
