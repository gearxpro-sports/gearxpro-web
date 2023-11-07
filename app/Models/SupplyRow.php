<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyRow extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $casts = [
        'product' => 'object'
    ];

    public function supply() {
        return $this->belongsTo(Supply::class);
    }
}
