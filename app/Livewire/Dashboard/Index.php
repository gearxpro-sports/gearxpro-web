<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public User $reseller;

    public function mount() {
        $this->reseller = auth()->user();
    }

    public function checkResellerMissingData() {
        if (
            (!$this->reseller->tax || !$this->reseller->stripe_public_key || !$this->reseller->stripe_private_key) &&
            !auth()->user()->hasRole(\App\Models\User::SUPERADMIN)
        ) {
                $this->dispatch('openModal', 'modals.reseller-missing-data-request');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
