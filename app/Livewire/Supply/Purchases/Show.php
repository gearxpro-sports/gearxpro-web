<?php

namespace App\Livewire\Supply\Purchases;

use App\Models\Supply;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var Supply
     */
    public Supply $supply;

    /**
     * @var array
     */
    public $statuses = [];

    public function mount()
    {
        $this->statuses = Supply::STATUSES;
    }

    public function render()
    {
        return view('livewire.supply.purchases.show');
    }

    public function changeStatus(string $status)
    {
        if (
            !in_array($status, array_keys(Supply::STATUSES)) ||
            in_array($this->supply->status, ['delivered', 'canceled'])
        ) {
            $this->dispatch('open-notification',
                subtitle: __('notifications.supply.status_changed.error'),
                type: 'error'
            );

            return false;
        }

        $this->supply->status = $status;
        $this->supply->save();

        $this->dispatch('open-notification',
            subtitle: __('notifications.supply.status_changed.success'),
            type: 'success'
        );
    }
}
