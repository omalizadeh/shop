<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING_PAYMENT = 1;
    const PACKING = 2;
    const SENT = 3;
    const DELIVERED = 4;
    const CANCELED = 5;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
