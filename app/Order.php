<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use FarsiTimestamps;

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

    public function getCartId()
    {
        return $this->attributes['cart_id'];
    }

    public function getDeliveryId()
    {
        return $this->attributes['delivery_id'];
    }

    public function getAddressId()
    {
        return $this->attributes['address_id'];
    }

    public function getCouponId()
    {
        return $this->attributes['coupon_id'];
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function isPendingPayment()
    {
        return $this->attributes['status'] === self::PENDING_PAYMENT;
    }
    public function isPacking()
    {
        return $this->attributes['status'] === self::PACKING;
    }
    public function isSent()
    {
        return $this->attributes['status'] === self::SENT;
    }
    public function isDelivered()
    {
        return $this->attributes['status'] === self::DELIVERED;
    }
    public function isCanceled()
    {
        return $this->attributes['status'] === self::CANCELED;
    }

    public function getFarsiStatus()
    {
        switch ($this->getStatus()) {
            case self::PENDING_PAYMENT:
                return 'در انتظار پرداخت';
            case self::PACKING:
                return 'در حال بسته بندی';
            case self::SENT:
                return 'ارسال شده';
            case self::DELIVERED:
                return 'تحویل داده شده';
            case self::CANCELED:
                return 'لغو شده';
        }
    }
}
