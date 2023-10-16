<?php

namespace App\Livewire\Components\AdminTables;

use App\Models\User;
use Livewire\Attributes\Lazy;
use Illuminate\Contracts\View\View;

class CustomersTable extends BaseTable
{
    /**
     * @return View
     */
    public function render()
    {
        $customers = User::role(User::CUSTOMER)
            ->search(['firstname', 'lastname', 'email'], $this->search)
            ->select(['id', 'firstname', 'lastname', 'email', 'created_at'])
            ->orderByDesc('id')
            ->paginate()
        ;

        return view('livewire.components.admin-tables.customers-table', compact('customers'));
    }
}
