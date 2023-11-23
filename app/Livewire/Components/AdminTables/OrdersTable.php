<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class OrdersTable extends BaseTable
{
    /**
     * @var array
     */
    public array $selectedOrders = [];

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
            ->orderByDesc('id')
        ;

        return view('livewire.components.admin-tables.orders-table', [
            'orders' => $orders->paginate()
        ]);
    }

    public function deselectAllOrders()
    {
        $this->selectedOrders = [];
    }

    /**
     * @param string $status
     */
    public function updateSelectedOrders(string $status)
    {
        $statuses = Order::STATUSES;
        unset($statuses[Order::DELIVERED_STATUS]);

        if (!$this->selectedOrders || !isset($statuses[$status])) {
            $this->dispatch('open-notification',
                subtitle: __('notifications.orders.statuses_changed.error'),
                type: 'error'
            );
            return;
        }

        $updateData = ['status' => $status];

        if ($status === Order::SHIPPED_STATUS) {
            $updateData['shipped_at'] = now();
            // TODO: Integrare qui le API del servizio di spedizione
        }

        Order::whereIn('id', $this->selectedOrders)->update($updateData);

        $this->deselectAllOrders();

        $this->dispatch('open-notification',
            title: __('orders.statuses.'.$status),
            subtitle: __('notifications.orders.statuses_changed.success'),
            type: 'success'
        );
    }
}
