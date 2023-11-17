<?php

namespace App\Livewire\Resellers\Modals;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Disable extends ModalComponent
{
    public User $reseller;

    public function disable() {
        $this->reseller->delete();

        return redirect()->route('resellers.index');
    }
    public function render()
    {
        return view('livewire.resellers.modals.disable');
    }
}
