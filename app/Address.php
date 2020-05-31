<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function getProvinceId()
    {
        return $this->attributes['province_id'];
    }

    public function getCityId()
    {
        return $this->attributes['city_id'];
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }
}
