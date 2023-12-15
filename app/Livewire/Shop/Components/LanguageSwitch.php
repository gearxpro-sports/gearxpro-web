<?php

namespace App\Livewire\Shop\Components;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

use Livewire\Component;

class LanguageSwitch extends Component
{
    public $languages = [];
    public $current;
    public $route;

    public function mount()
    {
        $this->languages = array_keys(config('gearxpro.languages'));
        $this->current = session()->get('language', app()->getLocale());
        session()->put('language', $this->current);
    }

    #[On('changeLanguage')]
    public function changeLanguage($language)
    {
        $this->current = $language;

        session()->put('language', $language);

        if ('shop.show' === $this->route['name']) {
            return redirect()->route('shop.show', [
                'country_code' => session('country_code'),
                'product' => $this->route['params']['product']->getTranslation('slug', $this->current)
                ]
            );
        }

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.shop.components.language-switch');
    }
}
