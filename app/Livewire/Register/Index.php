<?php

namespace App\Livewire\Register;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Layout('layouts.register')]
class Index extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $password_confirmation;
    public $formatPassword = [
        'Un carattere in MAIUSCOLO',
        'Un numero',
        '8 caratteri',
        'Un carattere in minuscolo',
        'Un carattere speciale (&*€%)'
    ];
    public $keyFormat = [];

    public function updated($property) {
        if ($property === 'password') {
            $password = str_split($this->password);
            if (count($password) > 7) {
                $this->keyFormat[2] = 2;
            }
            foreach ($password as $letter) {
                if (ctype_upper($letter)) {
                    $this->keyFormat[0] = 0;
                }
                if (is_numeric($letter)) {
                    $this->keyFormat[1] = 1;
                }
                if (ctype_lower($letter)) {
                    $this->keyFormat[3] = 3;
                }
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $letter)) {
                    $this->keyFormat[4] = 4;
                }
            }
        }
    }

    public function rules() {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function messages() {
        return [
            'firstname.required' => __('shop.payment.required'),
            'lastname.required' => __('shop.payment.required'),
            'email.required' => __('shop.payment.required'),
            'password.required' => __('shop.payment.required'),
            'password.confirmed' => __('shop.payment.password_confirmation'),
        ];
    }

    public function store() {
        $this->validate();

        if (count($this->keyFormat) > 4 AND $this->password === $this->password_confirmation) {
            $user = User::create($this->validate());
            // $this->dispatch('user', $user);
            Auth::login($user);

            $this->redirect('/shop/payment');
        }
    }

    public function render()
    {
        return view('livewire.register.index');
    }
}
