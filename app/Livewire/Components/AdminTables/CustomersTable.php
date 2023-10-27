<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\User;
use Illuminate\Contracts\View\View;

class CustomersTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $customers = User::role(User::CUSTOMER)
            ->search(['firstname', 'lastname', 'email'], $this->search)
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

        return view('livewire.components.admin-tables.customers-table', [
            'customers' => $customers->paginate()
        ]);
    }
}
