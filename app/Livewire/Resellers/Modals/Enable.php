<?php

namespace App\Livewire\Resellers\Modals;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Enable extends ModalComponent
{
    public $reseller;
    public $already_exist;

    public function mount($reseller) {
        $this->reseller = User::withTrashed()->find($reseller);
        $this->already_exist = User::role(User::RESELLER)->withTrashed()->where('deleted_at', NULL)->where('country_id', $this->reseller->country_id)->first();
    }

    public function enable() {
        if($this->already_exist) {
            $this->already_exist->delete();

//            $this->dispatch('open-notification',
//                title: __('Errore'),
//                subtitle: __("Non puoi riabilitare il Rivenditore in quanto ne esiste già un altro per la nazione '{$this->reseller->country->name}'"),
//                type: 'error'
//            );
        }
        $this->reseller->restore();
        return redirect()->route('resellers.index');
    }
    public function render()
    {
        return view('livewire.resellers.modals.enable');
    }
}
