<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    const AMOUNT_DISCOUNT = 1;
    const PERCENT_DISCOUNT = 2;

    public function product()
    {
        return $this->belongsTo(Discount::class);
    }
}
