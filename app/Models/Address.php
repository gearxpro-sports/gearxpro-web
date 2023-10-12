<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    const TYPES = [
        'invoice',
        'delivery',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'country_id',
        'type',
        'address_1',
        'address_2',
        'postcode',
        'city',
        'state',
        'phone',
        'company',
        'vat_number',
        'tax_code',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
