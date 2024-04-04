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
        $customers = User::role(User::CUSTOMER)->with('customerOrders')
            ->search($this->search, [
                'firstname',
                'lastname',
                'email'
            ])
            ->orderByDesc('id');

        if (auth()->user()->hasRole(User::SUPERADMIN)) {
            $customers->with(['country.reseller', 'customerOrders']);
        }

        if (auth()->user()->hasRole(User::AGENT)) {
            $customers->where('idAgent', auth()->user()->id);
            $customers->with(['agent']);
        }

        foreach ($this->filters as $k => $filter) {
            if ($k === 'date') {
                if ($filter['mode'] === 'single') {
                    $customers->whereDate($filter['column'], $filter['operator'], $filter['value']);
                } elseif ($filter['mode'] === 'range') {
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
