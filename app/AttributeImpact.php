<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeImpact extends Model
{
    const NO_CHANGE = 1;
    const INCREASE = 2;
    const DECREASE = 3;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
