<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasTranslations;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'main_desc',
        'features_desc',
        'pros_desc',
        'technical_desc',
        'washing_desc',
        'slug',
        'meta_title',
        'meta_description',
        'has_variants',
        'active',
        'country_id',
    ];

    /**
     * @var array
     */
    public array $translatable = [
        'name',
        'main_desc',
        'features_desc',
        'pros_desc',
        'technical_desc',
        'washing_desc',
        'slug',
        'meta_title',
        'meta_description',
    ];

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this
            ->belongsTo(Country::class)
            ->withPivot('wholesale_price', 'price')
        ;
    }

    /**
     * @return HasMany
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
