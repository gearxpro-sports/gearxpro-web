<?php

namespace App\Livewire\Customers;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if(auth()->user()->hasRole(User::SUPERADMIN, User::RESELLER)) {
            return view('livewire.customers.index');
        } elseif(auth()->user()->hasRole(User::AGENT)) {
            return view('livewire.customers.index-agent');
        }

        abort(403, 'Unauthorized action.');
    }
}
