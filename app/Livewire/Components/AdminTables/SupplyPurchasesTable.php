<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Supply;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class SupplyPurchasesTable extends BaseTable
{
    public $selected_status = null;

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
//                'reseller.firstname',
//                'reseller.lastname',
            ])
            ->orderByDesc('created_at');

        $this->filterByDate($orders);

        if($this->selected_status) {
            $orders->where('supplies.status', $this->selected_status);
        }

        return view('livewire.components.admin-tables.supply-purchases-table', [
            'orders' => $orders->paginate(),
            'statuses' => array_keys(Supply::STATUSES)
        ]);
    }
}
