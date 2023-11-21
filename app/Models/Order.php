<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, Searchable;

    const CANCELED_STATUS      = 'canceled';
    const PAID_STATUS           = 'paid';
    const IN_PREPARATION_STATUS = 'in_preparation';
    const SHIPPED_STATUS        = 'shipped';
    const DELIVERED_STATUS      = 'delivered';
    const REFUNDED_STATUS       = 'refunded';

    const STATUSES = [
        self::CANCELED_STATUS      => 'gray',
        self::PAID_STATUS           => 'blue',
        self::IN_PREPARATION_STATUS => 'lightblue',
        self::SHIPPED_STATUS        => 'blue',
        self::DELIVERED_STATUS      => 'green',
        self::REFUNDED_STATUS       => 'gray',
    ];

    const STRIPE_PAYMENT = 'stripe';

    const PAYMENT_METHODS = [
        self::STRIPE_PAYMENT,
    ];

    /**
     * @var array
     */
    protected $casts = [
        'billing_address'  => 'object',
        'shipping_address' => 'object',
        'items'            => 'object',
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function reseller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reseller_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
