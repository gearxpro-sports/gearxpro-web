<?php

namespace App\Livewire\Components\AdminTables;

use Illuminate\Contracts\View\View;

class OrdersTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $orders = auth()->user()->resellerOrders()
            ->search($this->search, [
                'reference',
                'customer.firstname',
                'customer.lastname',
            ])
            ->orderByDesc('created_at')
        ;

        return view('livewire.components.admin-tables.orders-table', [
            'orders' => $orders->paginate()
        ]);
    }
}
