<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUserForm extends Component
{
    public $password;

    public function rules()
    {
        return [
            'password' => ['required', 'current_password'],
        ];
    }

    public function destroy() {
        $this->validate();
        $user = auth()->user();

        Auth::logout();

        // TODO: Chiedere se soft-delete o hard-delete
        $user->delete();

        $user->session()->invalidate();
        $user->session()->regenerateToken();

        return redirect()->route('shop.index');
    }

    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }
}
