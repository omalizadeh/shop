<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function weightRange()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function priceRange()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }
}
