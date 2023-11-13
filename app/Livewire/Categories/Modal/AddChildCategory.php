<?php

namespace App\Livewire\Categories\Modal;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use App\Livewire\Categories\Forms\CategoryForm;

class AddChildCategory extends ModalComponent
{
    /**
     * @var CategoryForm
     */
    public CategoryForm $childCategoryForm;

    /**
     * @var Category
     */
    public Category $category;

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.categories.modal.add-child-category');
    }

    public function store()
    {
        if ($this->category->parent_id === null) {
            $this->childCategoryForm->store($this->category->id);
            $this->dispatch('open-notification',
                title: __('notifications.titles.saving'),
                subtitle: __('notifications.categories.saving.success'),
                type: 'success',
            );
        }

        $this->dispatch('closeModal');
        $this->dispatch('reload-child-categories');
    }
}
