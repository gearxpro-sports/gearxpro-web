<?php

namespace App\Livewire\Invoices;

use App\Models\Supply;
use Livewire\Component;

class Show extends Component
{
    public Supply $supply;

    public function render()
    {
        return view('livewire.invoices.show')->layout('layouts.blank');;
    }
}
