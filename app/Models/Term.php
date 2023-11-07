<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Term extends Model
{
    use HasFactory, HasTranslations;

    /**
     * @var array
     */
    protected $hidden = [
        'group_attribute_id',
        'pivot',
    ];

    /**
     * @var array
     */
    public array $translatable = [
        'value',
    ];

    /**
     * @return BelongsTo
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return BelongsToMany
     */
    public function productVariants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class);
    }
}
