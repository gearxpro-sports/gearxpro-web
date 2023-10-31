<?php

namespace App\Livewire\Shop\Components;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LanguageSwitch extends Component
{
    public $languages = ["it", "en", "fr", "de", "es"];
    public $current;

    public function mount()
    {
        if (session('language')) {
            app()->setLocale(session('language'));
            $this->current = session('language');
        } else {
            $this->current = session()->get('language', app()->getLocale());
            session()->put('language', $this->current);
        }
    }

    public function changeLanguage($language)
    {
        $this->current = $language;

        Session::put('language', $language);
        App::setLocale($language);
    }

    public function render()
    {
        return view('livewire.shop.components.language-switch');
    }
}
