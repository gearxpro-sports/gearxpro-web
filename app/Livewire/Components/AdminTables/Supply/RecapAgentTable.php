<?php

namespace App\Livewire\Components\AdminTables\Supply;

use App\Livewire\Components\AdminTables\BaseTable;
use App\Models\Supply;
use App\Models\SupplyRow;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;

class RecapAgentTable extends BaseTable
{
    public Supply $supply;
    public $rows;

    public function mount() {
        $this->supply = auth()->user()->supplies()->where('confirmed', false)->first();
        $this->rows = $this->supply->rows;
    }

    public function deleteItem($id) {
        $row = $this->rows->find($id);
        $this->supply->update([ 
            'amount' => $this->supply->amount - ($row->quantity * $row->price)
        ]);
        $row->delete();
        $this->dispatch('item-deleted');
    }

    /**
     * @return View
     */
    #[On('item-deleted')]
    public function render()
    {
        return view('livewire.components.admin-tables.supply.recap-table');
    }
}
