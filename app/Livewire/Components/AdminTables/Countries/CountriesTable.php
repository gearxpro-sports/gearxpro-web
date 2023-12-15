<?php

namespace App\Livewire\Components\AdminTables\Countries;

use App\Livewire\Components\AdminTables\BaseTable;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class CountriesTable extends BaseTable
{
    /**
     * @var Collection
     */
    public Collection $resellers;

    public function mount()
    {
        $this->resellers = User::role(User::RESELLER)->get();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.components.admin-tables.countries.countries-table', [
            'countries' => Country::with('reseller')->search($this->search, ['name', 'iso2_code', 'iso3_code'])->paginate(50),
        ]);
    }
}
