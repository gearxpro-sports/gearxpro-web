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
        $products = Product::with('defaultVariantWithMedia')
            ->search($this->search, [
                'name'
            ])
            ->orderBy('created_at')
            ->paginate();

        return view('livewire.components.admin-tables.products-table', [
            'products' => $products
        ]);
    }

    /**
     * @param Product $product
     */
    public function deleteProduct(Product $product)
    {
        $product->delete();

        $this->dispatch('open-notification',
            title: __('notifications.titles.deleting'),
            subtitle: __('notifications.products.deleting.success'),
            type: 'success'
        );
    }
}
