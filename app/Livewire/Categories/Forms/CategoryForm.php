<?php

namespace App\Livewire\Categories\Forms;

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
     * @var string|null
     */
    public ?string $name = '';

    /**
     * @var string|null
     */
    public ?string $description = '';

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
            $this->{$field} = $category->{$field};
        }
    }

    /**
     * @param int|null $parentCategoryId
     */
    public function store(?int $parentCategoryId = null)
    {
        $fields = $this->only(['name', 'description']);
        $fields['parent_id'] = (int) $parentCategoryId;

        Category::create($fields);
    }

    public function update()
    {
        $this->validate();

        $this->category->update($this->only(['name', 'description']));
    }
}
