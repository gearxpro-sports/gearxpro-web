<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Contracts\View\View;

class InvoicesTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        if(auth()->user()->hasRole(User::RESELLER)) {
            $invoices = auth()->user()->invoices()->with('supply')
                ->search($this->search, [
                    'code',
                    'supply.reseller.firstname'
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

        foreach ($this->filters as $k => $filter) {
            if ($k === 'date') {
                if ($filter['mode'] === 'single') {
                    $invoices->whereDate($filter['column'], $filter['operator'], $filter['value']);
                } elseif ($filter['mode'] === 'range') {
                    $invoices->whereBetween($filter['column'], $filter['value']);
                }
            } else {
                $invoices->where($filter['column'], $filter['operator'], $filter['value']);
            }
        }

        return view('livewire.components.admin-tables.invoices-table', [
            'invoices' => $invoices->paginate()
        ]);
    }
}
