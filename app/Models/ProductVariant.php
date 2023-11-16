<?php

namespace App\Models;

use App\Traits\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

    /**
     * @var array
     */
    protected $with = [
        'attributes',
        'product',
    ];

    public function inStock() {
        return $this->quantity > 0;
    }

    public function getLengthAttribute()
    {
        return $this->terms->where('attribute_id', 1)->first();
    }

    public function getColorAttribute()
    {
        return $this->terms->where('attribute_id', 2)->first();
    }

    public function getSizeAttribute()
    {
        return $this->terms->where('attribute_id', 3)->first();
    }

    /**
     * @param string $conversion
     * @return string
     */
    public function getThumbUrl(string $conversion = 'thumb'): string
    {
        return $this->getFirstMediaUrl('products', $conversion);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsToMany
     */
    public function attributes(): BelongsToMany
    {
        return $this->BelongsToMany(Attribute::class)->withPivot('term_id');
    }

    /**
     * @return BelongsToMany
     */
    public function terms(): BelongsToMany
    {
        return $this->belongsToMany(Term::class, 'attribute_product_variant', 'product_variant_id', 'term_id')
            ->join('attributes', 'attributes.id', '=', 'attribute_product_variant.attribute_id')
            ->orderBy('attributes.position');
    }

    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope('order_by_position', function (Builder $builder) {
            $builder->orderBy('position');
        });
    }

    /**
     * @param Media|null $media
     * @return void
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_FILL, 150, 150)
            ->background('FFFFFF')
            ->nonQueued()
        ;

        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 300, 300)
            ->background('FFFFFF')
            ->nonQueued()
        ;

        $this
            ->addMediaConversion('medium')
            ->fit(Manipulations::FIT_FILL, 650, 650)
            ->background('FFFFFF')
            ->nonQueued()
        ;
    }

    /**
     * @return HasMany
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
