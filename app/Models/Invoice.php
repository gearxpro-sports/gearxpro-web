<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, Searchable;

    const STATUSES = [
        'to_pay' => 'black',
        'not_payed' => 'red',
        'payed' => 'lightgreen',
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestInvoice = static::latest()->first();
            $sequence = $latestInvoice ? $latestInvoice->code + 1 : 1;
            $model->code = str_pad($sequence, 5, '0', STR_PAD_LEFT);
        });
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }
}
