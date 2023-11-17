<?php

namespace App\Livewire\Resellers;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    /**
     * @var User
     */
    public $reseller;

    public function mount($reseller) {
        $this->reseller = User::withTrashed()->find($reseller);
    }

    /**
     * @return View
     */
    public function render()
    {
        $addresses = $this->reseller->addresses;
        $orders = $this->reseller->supplies()
            ->where('confirmed', true)
            ->orderByDesc('created_at');

        return view('livewire.resellers.show', [
            'billing_address' => $addresses->firstWhere('type', 'billing'),
            'shipping_address' => $addresses->firstWhere('type', 'shipping'),
            'orders' => $orders->paginate()
        ]);
    }
}
