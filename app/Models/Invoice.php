<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestInvoice = static::latest()->first();
            $sequence = $latestInvoice ? $latestInvoice->code + 1 : 1;
            $model->code = str_pad($sequence, 5, '0', STR_PAD_LEFT);
        });
    }

    public function supply() {
        return $this->belongsTo(Supply::class);
    }
}
