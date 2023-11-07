<?php

namespace App\Livewire\Supply;

use Livewire\Attributes\On;
use Livewire\Component;

class Recap extends Component
{
    public $supply;

    public function mount() {
        $this->supply = auth()->user()->supplies()->where('confirmed', false)->first();
        if(!$this->supply) {
            return redirect()->route('supply.index');
        }
    }

    public function confirm() {
        $this->supply->update([
            'confirmed' => true,
            'payment_method' => $this->supply->reseller->payment_method
        ]);

        return redirect()->route('supply.purchases.index');
    }

    #[On('item-deleted')]
    public function render()
    {
        return view('livewire.supply.recap');
    }
}
