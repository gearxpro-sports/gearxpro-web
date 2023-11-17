<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function variant() {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }
}
