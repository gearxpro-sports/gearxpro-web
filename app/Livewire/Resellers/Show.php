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
        $addresses = $this->reseller->addresses;

        return view('livewire.resellers.show', [
            'billing_address' => $addresses->firstWhere('type', 'billing'),
            'shipping_address' => $addresses->firstWhere('type', 'shipping')
        ]);
    }
}
