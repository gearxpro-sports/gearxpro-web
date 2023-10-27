<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, HasTranslations, Searchable;

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

    public function getWholesalePriceAttribute() {
        return $this->countries()->where('iso2_code', auth()->user()->country_code)->first()->prices->wholesale_price;
    }
    public function getPriceAttribute() {
        return $this->countries()->where('iso2_code', auth()->user()->country_code)->first()->prices->price;
    }

    /**
     * @return belongsToMany
     */
    public function countries(): belongsToMany
    {
        return $this
            ->belongsToMany(Country::class)
            ->withPivot('wholesale_price', 'price')
            ->as('prices')
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
