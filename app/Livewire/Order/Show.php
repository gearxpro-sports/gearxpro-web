<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var Order
     */
    public Order $order;

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.orders.show');
    }


    public function changeStatus(string $status)
    {
        if (!isset(Order::STATUSES[$status]) || ($status === Order::DELIVERED_STATUS && !$this->order->shipped_at)) {
            $this->dispatch('open-notification',
                subtitle: __('notifications.orders.status_changed.error'),
                type: 'error'
            );
            return;
        }

        $updateData = ['status' => $status];

        if ($status === Order::SHIPPED_STATUS) {
            $updateData['shipped_at'] = now();
            // TODO: Integrare qui le API del servizio di spedizione
        }

        if (in_array($status, [Order::REFUNDED_STATUS, Order::CANCELED_STATUS])) {
            foreach ($this->order->items as $item) {
                auth()->user()->stocks()->where('product_id', $item->product_id)->where('product_variant_id', $item->variant_id)->increment('quantity', $item->quantity);
            }
        }

        $this->order->update($updateData);

        $this->dispatch('open-notification',
            title: __('orders.statuses.'.$status),
            subtitle: __('notifications.orders.status_changed.success'),
            type: 'success'
        );
    }
}
