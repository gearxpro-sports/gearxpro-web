<?php

namespace App\Livewire\Components\AdminTables;

use Illuminate\Contracts\View\View;

class InvoicesTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $invoices = auth()->user()->invoices()->with('supply')
            ->search($this->search, [
                'code',
            ])
            ->orderByDesc('created_at');

//        foreach ($this->filters as $k => $filter) {
//            if ($k === 'date') {
//                if ($filter['mode'] === 'single') {
//                    $invoices->whereDate($filter['column'], $filter['operator'], $filter['value']);
//                } elseif ($filter['mode'] === 'range') {
//                    $invoices->whereBetween($filter['column'], $filter['value']);
//                }
//            } else {
//                $invoices->where($filter['column'], $filter['operator'], $filter['value']);
//            }
//        }

        return view('livewire.components.admin-tables.invoices-table', [
            'invoices' => $invoices->paginate()
        ]);
    }
}
