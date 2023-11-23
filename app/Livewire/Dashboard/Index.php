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

    public function checkTax() {
        if(!$this->reseller->tax && !auth()->user()->hasRole(\App\Models\User::SUPERADMIN)) {
            $this->dispatch('openModal', 'modals.tax');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
