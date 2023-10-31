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
        $categories = Category::search($this->search, [
            'name',
        ])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->paginate();

        return view('livewire.components.admin-tables.categories-table', compact('categories'));
    }
}
