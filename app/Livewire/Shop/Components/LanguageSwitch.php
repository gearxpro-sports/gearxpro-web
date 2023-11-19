<?php

namespace App\Livewire\Shop\Components;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;

use Livewire\Component;

class LanguageSwitch extends Component
{
    public $languages = ["it", "en", "fr", "de", "es"];
    public $current;

    public function mount()
    {
        $this->current = session()->get('language', app()->getLocale());
        session()->put('language', $this->current);
    }

    #[On('changeLanguage')]
    public function changeLanguage($language)
    {
        $this->current = $language;

        session()->put('language', $language);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.shop.components.language-switch');
    }
}
