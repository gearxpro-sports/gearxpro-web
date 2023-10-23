<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

trait HasCountryScope
{
    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope('country_scope', function (Builder $builder) {
            if (Auth::hasUser()) {
                /** @var User $user */
                $user = Auth::user();
                
                $builder->when(!$user->hasRole(User::SUPERADMIN), fn (Builder $query) => $query->where('country_id', $user->country_id));
            }
        });
    }
}
