<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use FarsiTimestamps;

    const AMOUNT_DISCOUNT = 1;
    const PERCENT_DISCOUNT = 2;

    public function product()
    {
        return $this->belongsTo(Discount::class);
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
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
