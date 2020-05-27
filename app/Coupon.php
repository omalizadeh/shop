<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    const AMOUNT_DISCOUNT = 1;
    const PERCENT_DISCOUNT = 2;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
