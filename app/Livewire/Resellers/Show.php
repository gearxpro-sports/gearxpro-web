<?php

namespace App\Livewire\Resellers;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var User
     */
    public User $reseller;

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.resellers.show', [
            'billingAddress' => $this->reseller->addresses->firstWhere('type', 'billing'),
            'shippingAddress' => $this->reseller->addresses->firstWhere('type', 'shipping'),
        ]);
    }
}
