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
            $orders = Supply::with('reseller')->where('user_id', auth()->user()->id);
        } else {
            $orders = Supply::with('reseller');
        }

        $orders
            ->where('confirmed', true)
            ->search($this->search, [
                'uuid',
                'reseller.firstname',
                'reseller.lastname',
            ])
            ->orderByDesc('created_at');

        $this->filterByDate($orders);

        return view('livewire.components.admin-tables.supply-purchases-table', [
            'orders' => $orders->paginate()
        ]);
    }
}
