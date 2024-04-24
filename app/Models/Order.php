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

    const CUSTOMER_STATUSES = [
        self::PAID_STATUS         => 'customer_paid',
        self::IN_PROCESS_STATUS   => 'customer_processing',
        self::IN_SHIPPING_STATUS  => 'customer_shipping',
        self::SHIPPED_STATUS      => 'customer_shipped',
        self::DELIVERED_STATUS    => 'customer_delivered',
        self::REFUNDED_STATUS     => 'customer_refunded',
        self::CANCELED_STATUS     => 'customer_canceled',
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
        'total_full'       => 'float',
        'discount'         => 'string',
        'paid_at'          => 'datetime',
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
