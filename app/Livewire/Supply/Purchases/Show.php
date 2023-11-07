<?php

namespace App\Livewire\Supply\Purchases;

use App\Models\Stock;
use App\Models\User;
use App\Models\Supply;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    /**
     * @var Supply
     */
    public Supply $supply;

    public function changeStatus(string $status)
    {
        if (
            !Auth::user()->hasRole(User::SUPERADMIN) ||
            !in_array($status, array_keys(Supply::STATUSES)) ||
            $this->supply->status === 'canceled'
        ) {
            $this->dispatch('open-notification',
                title: __('supply.statuses.'.$this->supply->status),
                subtitle: __('notifications.supply.status_changed.error'),
                type: 'error'
            );

            return false;
        }

        foreach ($this->supply->rows as $row) {
            $product_id = $row->product->product->id;
            $variant_id = $row->product->id;

            $exists = $this->supply->reseller->stocks()->where('product_id', $product_id)->where('product_variant_id', $variant_id)->first();

            if ($exists) {
                $exists->increment('quantity', $row->quantity);
            } else {
                Stock::updateOrCreate([
                    'user_id' => $this->supply->reseller->id,
                    'product_id' => $product_id,
                    'product_variant_id' => $variant_id,
                ], [
                    'quantity' => $row->quantity
                ]);
            }
        }

        if ($status === 'on_delivery') {
            $this->supply->update([
                'status' => 'on_delivery',
                'shipped_at' => now()
            ]);
        } else {
            $this->supply->status = $status;
            $this->supply->save();

            if($status === 'delivered') {
                $invoice = $this->supply->invoice()->create();
                $invoice->update([
                    'updated_at' => now(),
                    'payment_method' => $this->supply->payment_method
                ]);
            }
        }


        $this->dispatch('open-notification',
            title: __('supply.statuses.'.$this->supply->status),
            subtitle: __('notifications.supply.status_changed.success'),
            type: 'success'
        );
    }

    public function setInvoiceStatus($status) {
        $this->supply->invoice->update([
            'status' => $status
        ]);
    }

    public function render()
    {
        return view('livewire.supply.purchases.show');
    }
}
