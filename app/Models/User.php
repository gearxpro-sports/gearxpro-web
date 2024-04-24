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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Discount;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasCountryScope, SoftDeletes, Searchable;

    const SUPERADMIN = 'superadmin';
    const RESELLER   = 'reseller';
    const CUSTOMER   = 'customer';
    const AGENT      = 'agent';

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
        'stripe_public_key' => 'encrypted',
        'stripe_private_key' => 'encrypted',
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
        return strtolower((string) $this->country?->iso2_code) ?: config('app.country');
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
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idAgent', 'id');
    }
    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'user_discounts')
                    ->withPivot('priority')
                    ->orderBy('pivot_priority');
    }

    /**
     * Accessor to get the primary (or only) discount.
     *
     * @return \App\Models\Discount|null
     */
    public function getPrimaryDiscountAttribute()
    {
        return $this->discounts->first();
    }

    /**
     * @return HasMany
     */
    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class, 'creator_id', 'id');
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

    /**
     * Retrieve active discounts for the user.
     *
     * @return array
     */
    public function getActiveDiscountsAttribute()
    {
        return $this->discounts()
                    ->orderBy('pivot_priority')
                    ->get()
                    ->map(function ($discount) {
                        return $discount->percentage;
                    })
                    ->toArray();
    }

    /**
     * Calculate the discounted price based on the original price and user discounts.
     *
     * @param float $originalPrice The original price of the order.
     * @return float
     */
    public function calculateDiscountedPrice($originalPrice)
    {
        $discountedPrice = $originalPrice;

        foreach ($this->active_discounts as $discount) {
            $discountedPrice -= ($discountedPrice * ($discount / 100));
        }

        return $discountedPrice;
    }
}
