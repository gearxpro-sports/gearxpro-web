<?php

namespace App\Livewire\Resellers\Modals;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public User $reseller;

    public function delete() {
        // TODO: Risolvere constraints
        $this->reseller->delete();

        return redirect()->route('resellers.index');
    }
    public function render()
    {
        return view('livewire.resellers.modals.delete');
    }
}
