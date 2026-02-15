<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSell extends Model
{protected $fillable = [
    'name',
    'model',
    'number',
    'buy_price',
    'sell_price',
    'barcode'
];

    public function devices()
    {
        return $this->belongsTo(Devices::class);
    }
}