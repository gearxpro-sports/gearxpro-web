<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, Searchable;

    const PAID_STATUS        = 'paid';
    const IN_PROCESS_STATUS  = 'in_process';
    const IN_SHIPPING_STATUS = 'in_shipping';
    const SHIPPED_STATUS     = 'shipped';
    const DELIVERED_STATUS   = 'delivered';
    const REFUNDED_STATUS    = 'refunded';
    const CANCELED_STATUS    = 'canceled';

    const STATUSES = [
        self::PAID_STATUS         => 'blue',
        self::IN_PROCESS_STATUS   => 'lightblue',
        self::IN_SHIPPING_STATUS  => 'orange',
        self::SHIPPED_STATUS      => 'lightgreen',
        self::DELIVERED_STATUS    => 'green',
        self::REFUNDED_STATUS     => 'black',
        self::CANCELED_STATUS     => 'red',
    ];

    const STRIPE_PAYMENT = 'stripe';

    const PAYMENT_METHODS = [
        self::STRIPE_PAYMENT,
    ];

    /**
     * @var array
     */
    protected $casts = [
        'total'            => 'float',
        'shipped_at'       => 'datetime',
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

    public function getProducts() {
        $products = [];

        foreach ($this->items as $item) {
            $products[] = Product::find($item->product_id);
        }

        return $this->items;
    }
}
