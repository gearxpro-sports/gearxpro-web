<?php

namespace App\Livewire\Categories;

use Symfony\Component\HttpFoundation\Response;
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
     * @var Category
     */
    public CategoryForm $categoryForm;

    /**
     * @var Collection
     */
    public Collection $childCategories;

    /**
     * @param Category $category
     */
    public function mount()
    {
        $this->categoryForm->setCategoryForm($this->category);
        $this->childCategories = $this->category->children;
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
        $this->childCategories = $this->category->children;
    }
}
