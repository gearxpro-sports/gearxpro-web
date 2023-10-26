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
        if (Auth::user()->hasRole(User::RESELLER)) {
            $orders = Supply::where('user_id', Auth::user()->id)
                        ->select(['id', 'uuid', 'amount', 'created_at', 'status']);
        } else {
            $orders = Supply::select([
                            'supplies.id AS id',
                            'uuid', 'amount',
                            'supplies.created_at as created_at',
                            'status',
                            'users.id AS reseller_id',
                            DB::raw('CONCAT(users.firstname, \' \', users.firstname) AS reseller_fullname'),
                        ])
                        ->leftJoin('users', 'supplies.user_id', '=', 'users.id');
        }

        $orders
            ->where('confirmed', true)
            ->search(['uuid'], $this->search)
            ->orderByDesc('created_at')
        ;

        return view('livewire.components.admin-tables.supply-purchases-table', [
            'orders' => $orders->paginate()
        ]);
    }
}
