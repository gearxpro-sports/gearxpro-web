<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\User;
use Illuminate\Contracts\View\View;

class ResellersTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $resellers = User::with('roles')->role(User::RESELLER)
            ->search($this->search, [
                'firstname',
                'lastname',
                'email',
            ])
            ->withTrashed()
            ->orderByDesc('id');

        foreach($this->filters as $k => $filter) {
            if($k === 'date') {
                if($filter['mode'] === 'single') {
                    $resellers->whereDate($filter['column'], $filter['operator'], $filter['value']);
                } elseif($filter['mode'] === 'range') {
                    $resellers->whereBetween($filter['column'], $filter['value']);
                }
            } else {
                $resellers->where($filter['column'], $filter['operator'], $filter['value']);
            }
        }

        return view('livewire.components.admin-tables.resellers-table', [
            'resellers' => $resellers->paginate()
        ]);
    }
}
