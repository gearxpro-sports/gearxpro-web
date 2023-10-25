<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoriesTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $categories = Category::search(['name->it'], $this->search)
                        ->where('parent_id', '=', 0)
                        ->orderBy('name')
                        ->paginate()
        ;

        return view('livewire.components.admin-tables.categories-table', compact('categories'));
    }
}
