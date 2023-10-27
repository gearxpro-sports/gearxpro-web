<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasCountryScope;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasCountryScope;

    const SUPERADMIN = 'superadmin';
    const RESELLER   = 'reseller';
    const CUSTOMER   = 'customer';

    protected $perPage = 10;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * @var string[]
     */
    protected $dates = ['last_login'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'last_login' => 'datetime:d-m-Y H:i:s',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getRoleAttribute() {
        return $this->roles[0];
    }

    public function getFullnameAttribute() {
        return "$this->firstname $this->lastname";
    }

    public function getBillingAddressAttribute() {
        return $this->addresses()->firstWhere('type', 'billing');
    }
    public function getShippingAddressAttribute() {
        return $this->addresses()->firstWhere('type', 'shipping');
    }

    public function getCountryCodeAttribute() {
        return $this->country->iso2_code;
    }

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return HasMany
     */
    public function supplies(): HasMany 
    {
        return $this->hasMany(Supply::class);
    }

    /**
     * @return HasMany
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
