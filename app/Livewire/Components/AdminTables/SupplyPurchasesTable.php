<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Supply;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class SupplyPurchasesTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        if (auth()->user()->hasRole(User::RESELLER)) {
            $orders = Supply::where('user_id', auth()->user()->id);
        } else {
            $orders = Supply::with(['reseller']);
        }

        $orders
            ->where('confirmed', true)
            ->search($this->search, [
                'uuid',
                'reseller.firstname',
            ])
            ->orderByDesc('created_at');

        foreach ($this->filters as $k => $filter) {
            if ($k === 'date') {
                if ($filter['mode'] === 'single') {
                    $orders->whereDate($filter['column'], $filter['operator'], $filter['value']);
                } elseif ($filter['mode'] === 'range') {
                    $orders->whereBetween($filter['column'], $filter['value']);
                }
            } else {
                $orders->where($filter['column'], $filter['operator'], $filter['value']);
            }
        }

        return view('livewire.components.admin-tables.supply-purchases-table', [
            'orders' => $orders->paginate()
        ]);
    }
}
