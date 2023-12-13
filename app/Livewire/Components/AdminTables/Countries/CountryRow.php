<?php

namespace App\Livewire\Components\AdminTables\Countries;

use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CountryRow extends Component
{
    /**
     * @var Country
     */
    public Country $country;

    /**
     * @var Collection
     */
    public Collection $resellers;

    /**
     * @return View
     */
    #[On('refresh-country')]
    public function render(): View
    {
        return view('livewire.components.admin-tables.countries.country-row');
    }

    public function setReseller($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            $this->country->reseller_id = null;
        } elseif ($user->hasRole(User::RESELLER)) {
            $this->country->reseller_id = $user->id;
        }

        $this->country->update();

        $this->dispatch('open-notification',
            title: __('notifications.titles.updating'),
            subtitle: __('notifications.countries.updating_reseller.success'),
            type: 'success'
        );

        $this->dispatch('refresh-country');
    }
}
