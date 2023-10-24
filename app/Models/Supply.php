<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    const STATUSES = [
        'working',
        'completed',
    ];

    public function reseller() {
        return $this->belongsTo(User::class);
    }

    public function rows() {
        return $this->hasMany(SupplyRow::class);
    }
}
