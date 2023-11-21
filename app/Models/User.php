<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasCountryScope;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasCountryScope, SoftDeletes, Searchable;

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
        if(!$this->firstname && !$this->lastname) {
            return 'Guest';
        }

        return "$this->firstname $this->lastname";
    }

//    public function getBillingAddressAttribute() {
//        return $this->addresses()->firstWhere('type', 'billing');
//    }
//    public function getShippingAddressAttribute() {
//        return $this->addresses()->firstWhere('type', 'shipping');
//    }

    public function getInitialLettersAttribute() {
        $name = strtoupper(substr($this->firstname, 0, 1));
        $lastName = strtoupper(substr($this->lastname, 0, 1));
        $Initials = $name . ' ' . $lastName;
        return $Initials;
    }

    public function getCountryCodeAttribute() {
        return strtolower($this->country->iso2_code) ?? 'it';
    }

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function shipping_address() {
        return $this->hasOne(Address::class)->where('type', 'shipping');
    }

    public function billing_address() {
        return $this->hasOne(Address::class)->where('type', 'billing');
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

    /**
     * @return HasManyThrough
     */
    public function invoices(): HasManyThrough
    {
        return $this->hasManyThrough(Invoice::class, Supply::class);
    }

    /**
     * @return HasOne
     */
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * @return HasMany
     */
    public function customerOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function resellerOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'reseller_id')->with('customer');
    }
}
