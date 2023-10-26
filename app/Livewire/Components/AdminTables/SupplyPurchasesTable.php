<?php

namespace App\Livewire\Components\AdminTables;

use Illuminate\Contracts\View\View;

class SupplyPurchasesTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $orders = auth()->user()->supplies()->where('confirmed', true)->search(['uuid'], $this->search)->select(['id', 'uuid', 'amount', 'created_at', 'status'])->orderByDesc('created_at');
//        $orders = User::role(User::CUSTOMER)
//            ->search(['firstname', 'lastname', 'email'], $this->search)
//            ->select(['id', 'firstname', 'lastname', 'email', 'created_at'])
//            ->orderByDesc('id');
//
//        foreach($this->filters as $k => $filter) {
//            if($k === 'date') {
//                if($filter['mode'] === 'single') {
//                    $customers->whereDate($filter['column'], $filter['operator'], $filter['value']);
//                } elseif($filter['mode'] === 'range') {
//                    $customers->whereBetween($filter['column'], $filter['value']);
//                }
//            } else {
//                $customers->where($filter['column'], $filter['operator'], $filter['value']);
//            }
//        }

        return view('livewire.components.admin-tables.supply-purchases-table', [
            'orders' => $orders->paginate()
        ]);
    }
}
