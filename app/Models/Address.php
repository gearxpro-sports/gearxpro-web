<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    const TYPES = [
        'billing',
        'shipping',
    ];

    /**
     * @var array
     */
    protected $with = ['country'];

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

    public function getInlineFormatAttribute()
    {
        return sprintf('%s %s, %s - %s %s', $this->address_1, $this->address_2, $this->city, $this->postcode, $this->state);
    }
}
