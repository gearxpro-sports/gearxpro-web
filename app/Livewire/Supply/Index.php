<?php

namespace App\Livewire\Supply;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if (auth()->user()->hasRole(User::AGENT))
            return view('livewire.agent.supply.index', [
                'customers' => User::where('idAgent', auth()->user()->id)->select('id', "firstname", "lastname")->get()
            ]);
        
        return view('livewire.supply.index');
    }
}
