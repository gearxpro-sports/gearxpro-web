<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BuilderMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->searchMacro();
    }

    /**
     * Model search macro
     *
     * @see https://github.com/signifly/laravel-builder-macros/blob/master/src/macros/whereLike.php
     *
     * @return void
     */
    private function searchMacro(): void
    {
        //
    }
}
