<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeImpact extends Model
{
    const CONSTANT = 1;
    const INCREASER = 2;
    const REDUCER = 3;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAttributeId()
    {
        return $this->attributes['attribute_id'];
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function isIncreaser()
    {
        return $this->attributes['impact_type'] === self::INCREASER;
    }

    public function isReducer()
    {
        return $this->attributes['impact_type'] === self::REDUCER;
    }

    public function isConstant()
    {
        return $this->attributes['impact_type'] === self::CONSTANT;
    }
}
