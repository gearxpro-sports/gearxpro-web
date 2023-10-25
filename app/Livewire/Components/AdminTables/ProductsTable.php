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
        $products = Product::search(['name->it'], $this->search)
                ->orderBy('created_at')
                ->paginate()
        ;

        return view('livewire.components.admin-tables.products-table', [
            'products' => $products
        ]);
    }
}
