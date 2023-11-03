<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory, HasTranslations;

    /**
     * @var array
     */
    public array $translatable = [
        'name',
    ];

    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope('order_by_position', function (Builder $builder) {
            $builder->orderBy('position');
        });
    }

    public function terms(): HasMany
    {
        return $this->hasMany(Term::class);
    }
}
