<?php

namespace App\Livewire;

use App\Models\Supply;
use Livewire\Component;

class Invoice extends Component
{
    public Supply $supply;

    public function render()
    {
        return view('livewire.invoice')->layout('layouts.blank');;
    }
}
