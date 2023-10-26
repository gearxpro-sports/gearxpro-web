<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = [
        'product_id',
        'barcode',
        'sku',
        'quantity',
        'minimal_quantity',
        'low_stock_threshold',
        'low_stock_alert',
        'active',
        'position',
    ];

    /**
     * @var array
     */
    protected $with = [
        'attributes',
    ];

    public function inStock() {
        return $this->quantity > 0;
    }

    public function getLengthAttribute() {
        return $this->attributes()->where('group_attribute_id', 1)->first();
    }

    public function getColorAttribute() {
        return $this->attributes()->where('group_attribute_id', 2)->first();
    }

    public function getSizeAttribute() {
        return $this->attributes()->where('group_attribute_id', 3)->first();
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
        return $this->BelongsToMany(Attribute::class);
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
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
