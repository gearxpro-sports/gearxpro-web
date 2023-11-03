<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Livewire\Categories\Forms\CategoryForm;

class Edit extends Component
{
    /**
     * @var Category
     */
    public Category $category;

    /**
     * @var CategoryForm
     */
    public CategoryForm $categoryForm;

    /**
     * @var Collection
     */
    public Collection $childCategories;

    /**
     * @var Collection
     */
    public Collection $categories;

    /**
     * @var int|null
     */
    public ?int $existingToAdd = null;

    public function mount()
    {
        $this->categoryForm->setCategoryForm($this->category);
        $this->loadCategories();
    }

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.categories.edit');
    }

    public function update()
    {
        $this->categoryForm->update();

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.updating.success'),
            type: 'success'
        );
    }

    public function deleteParent()
    {
        $this->category->delete();

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     */
    public function deleteChild(Category $category)
    {
        $category->delete();
        $this->dispatch('reload-child-categories');
    }

    #[On('reload-child-categories')]
    public function refresh(){
        $this->loadCategories();
        $this->existingToAdd = null;
    }

    public function addExisting()
    {
        Category::findOrFail((int) $this->existingToAdd)->update(['parent_id' => $this->category->id]);
        $this->refresh();
        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.categories.updating.children_success'),
            type: 'success'
        );
    }

    private function loadCategories()
    {
        $categories = Category::where('id', '!=', $this->category->id)->orderBy('name->it')->get();
        $this->childCategories = $categories->where('parent_id', $this->category->id)->sortBy('id');
        $this->categories = $categories->whereNotIn('id', [$this->category->id, ...$this->childCategories->pluck('id')])->pluck('name', 'id');
    }
}
