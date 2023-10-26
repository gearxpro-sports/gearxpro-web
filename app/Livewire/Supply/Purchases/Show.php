<?php

namespace App\Livewire\Supply\Purchases;

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
            in_array($this->supply->status, ['delivered', 'canceled'])
        ) {
            $this->dispatch('open-notification',
                title: __('supply.statuses.'.$this->supply->status),
                subtitle: __('notifications.supply.status_changed.error'),
                type: 'error'
            );

            return false;
        }

        $this->supply->status = $status;
        $this->supply->save();

        $this->dispatch('open-notification',
            title: __('supply.statuses.'.$this->supply->status),
            subtitle: __('notifications.supply.status_changed.success'),
            type: 'success'
        );
    }

    public function render()
    {
        return view('livewire.supply.purchases.show');
    }
}
