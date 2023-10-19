<?php

namespace App\Livewire\Resellers;

use App\Livewire\Forms\UserForm;
use App\Models\Country;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;

    public function mount(User $reseller)
    {
        $this->form->setPost($reseller);
    }

    public function update()
    {
        $this->form->validate();
        $this->form->updateReseller();
    }

    public function render()
    {
        return view('livewire.resellers.edit', [
            'resellers' => User::role(User::RESELLER)->with('country')->get(),
            'countries' => Country::all()
        ]);
    }
}
