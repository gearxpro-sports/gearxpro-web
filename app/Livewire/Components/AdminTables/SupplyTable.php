<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\User;
use Illuminate\Contracts\View\View;

class SupplyTable extends BaseTable
{
    public $prices = [
        '0-20',
        '21-50',
        '51-100',
        '100+'
    ];
    public $availabilities = [
        'Disponibile',
        'Non disponibile'
    ];
    /**
     * @return View
     */
    public function render()
    {
        $customers = User::role(User::CUSTOMER)
            ->search(['firstname', 'lastname', 'email'], $this->search)
            ->select(['id', 'firstname', 'lastname', 'email', 'created_at'])
            ->orderByDesc('id');

        foreach($this->filters as $k => $filter) {
            if($k === 'date') {
                if($filter['mode'] === 'single') {
                    $customers->whereDate($filter['column'], $filter['operator'], $filter['value']);
                } elseif($filter['mode'] === 'range') {
                    $customers->whereBetween($filter['column'], $filter['value']);
                }
            } else {
                $customers->where($filter['column'], $filter['operator'], $filter['value']);
            }
        }

        return view('livewire.components.admin-tables.supply-table', [
            'customers' => $customers->paginate()
        ]);
    }
}
