<?php

namespace App\Livewire\Register;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.register')]
class Index extends Component
{
    public $name;
    public $lastName;
    public $email;
    public string $password;
    // public string $password_confirmation;
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
                $this->keyFormat[] = 2;
            }
            foreach ($password as $letter) {
                if (ctype_upper($letter)) {
                    $this->keyFormat[] = 0;
                }
                if (is_numeric($letter)) {
                    $this->keyFormat[] = 1;
                }
                if (ctype_lower($letter)) {
                    $this->keyFormat[] = 3;
                }
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $letter)) {
                    $this->keyFormat[] = 4;
                }
            }
        }
    }

    public function rules() {
        return [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed'],
            // 'password_confirmation' => 'same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => __('shop.payment.required'),
            'lastName.required' => __('shop.payment.required'),
            'email.required' => __('shop.payment.required'),
            'password.required' => __('shop.payment.required'),
            'password.confirmed' => __('shop.payment.password_confirmation'),
            // 'password_confirmation.same:password' => __('shop.payment.password_confirmation'),
        ];
    }

    public function store() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.register.index');
    }
}
