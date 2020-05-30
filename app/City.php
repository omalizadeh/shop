<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getProvinceId()
    {
        return $this->attributes['province_id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }
}
