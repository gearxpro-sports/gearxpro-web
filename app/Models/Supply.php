<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    const STATUSES = [
        'new' => 'orange',
        'in_process' => 'lightblue',
        'on_delivery' => 'blue',
        'delivered' => 'green',
        'canceled' => 'gray',
    ];

    public function reseller() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function rows() {
        return $this->hasMany(SupplyRow::class);
    }
}
