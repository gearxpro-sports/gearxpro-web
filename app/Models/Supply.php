<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory, Searchable;

    const STATUSES = [
        'new' => 'orange',
        'in_process' => 'lightblue',
        'on_delivery' => 'blue',
        'delivered' => 'green',
        'canceled' => 'gray',
    ];

    protected $casts = [
        'amount' => 'float',
        'shipped_at' => 'datetime'
    ];

    public function reseller() {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function rows() {
        return $this->hasMany(SupplyRow::class);
    }
}
