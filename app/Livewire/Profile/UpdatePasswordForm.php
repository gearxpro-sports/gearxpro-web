<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public $current_password, $password, $password_confirmation;

    public function rules() {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.profile.updating.success'),
            type: 'success'
        );
    }

    public function render()
    {
        return view('livewire.profile.update-password-form');
    }
}
