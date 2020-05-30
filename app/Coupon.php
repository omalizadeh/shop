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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getCode()
    {
        return $this->attributes['code'];
    }

    public function getAmount()
    {
        return $this->attributes['amount'];
    }

    public function isPercentage()
    {
        return $this->attributes['type'] === self::PERCENT_DISCOUNT;
    }
}
