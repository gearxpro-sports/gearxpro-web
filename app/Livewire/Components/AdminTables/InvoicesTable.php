<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Contracts\View\View;

class InvoicesTable extends BaseTable
{
    public $selected_status = null;
    /**
     * @return View
     */
    public function render()
    {
        if(auth()->user()->hasRole(User::RESELLER) || auth()->user()->hasRole(User::AGENT)) {
            $invoices = auth()->user()->invoices()->with('supply.reseller')
                ->search($this->search, [
                    'code',
                    'supply.reseller.firstname',
                    'supply.reseller.lastname'
                ])
                ->orderByDesc('created_at');
        } elseif(auth()->user()->hasRole(User::SUPERADMIN)) {
            $invoices = Invoice::with('supply.reseller')
                ->search($this->search, [
                    'code',
                    'supply.reseller.firstname',
                    'supply.reseller.lastname'
                ])
                ->orderByDesc('created_at');
        }

        $this->filterByDate($invoices);

        if($this->selected_status) {
            $invoices->where('invoices.status', $this->selected_status);
        }

        return view('livewire.components.admin-tables.invoices-table', [
            'invoices' => $invoices->paginate(),
            'statuses' => array_keys(Invoice::STATUSES)
        ]);
    }
}
