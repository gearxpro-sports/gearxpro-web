<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Vite;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use stdClass;

class Product extends Model
{
    use HasFactory, HasTranslations, Searchable, SoftDeletes;

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

    protected $appends = [
        'variants_combinations_array',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug->'.config('app.locale');
    }

    public function getWholesalePriceAttribute()
    {
        $country_code = auth()->check() ? auth()->user()->country_code : session('country_code');
        return $this->countries()->where('iso2_code', $country_code)->first()->prices->wholesale_price;
    }

    public function getPriceAttribute()
    {
        $country_code = auth()->check() ? auth()->user()->country_code : session('country_code');
        return $this->countries()->where('iso2_code', $country_code)->first()?->prices->price;
    }

    /**
     * @return stdClass
     */
    public function getDefaultImagesAttribute(): stdClass
    {
        $defaultVariant = $this->variants->first();

        if (!$defaultVariant) {
            return (object) [
                'thumb' => Vite::asset('resources/images/placeholder-medium.jpg'),
                'medium' => Vite::asset('resources/images/placeholder-medium.jpg'),
            ];
        }

        return (object) [
            'thumb' => $defaultVariant->getThumbUrl(),
            'medium' => $defaultVariant->getThumbUrl('medium'),
        ];
    }

    public function getVariantsCombinationsArrayAttribute()
    {
        // Ottenere i ProductVariant in stock legati al Product
        $variantsInStock = $this->variants()->withTrashed()->whereHas('stocks', function ($query) {
            $query->where('user_id', session('reseller_id'));
            $query->where('quantity', '>', 0);
        })->with('terms')->get();

        // Creare un array con chiavi composte dagli ID dei termini di attributo
        $attributeArray = [];
        foreach ($variantsInStock as $variant) {
            $terms = $variant->terms;
            $key = implode('-', $terms->pluck('id')->toArray());
            $attributeArray[] = $key;
        }

        return $attributeArray;
    }

    /**
     * @return belongsToMany
     */
    public function countries(): belongsToMany
    {
        return $this
            ->belongsToMany(Country::class)
            ->withPivot('wholesale_price', 'price')
            ->as('prices');
    }

    /**
     * @return HasMany
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class)->withTrashed();
    }

    /**
     * @return HasOne
     */
    public function defaultVariantWithMedia(): HasOne
    {
        return $this
            ->hasOne(ProductVariant::class)
            ->with('media')
            ->without(['product', 'attributes'])
            ->has('media');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @return array
     */
    public function getCountryPricesAttribute(): array
    {
        $prices = [];

        foreach ($this->countries as $country) {
            $prices[$country->id] = [
                'wholesale_price' => $country->prices->wholesale_price,
                'price' => $country->prices->price,
            ];
        }

        return $prices;
    }

    /**
     * @return HasMany
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
