<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductsTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.components.admin-tables.products-table', [
            'products' => collect([])
        ]);
    }
}
