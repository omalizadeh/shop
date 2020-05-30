<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getPosition()
    {
        return $this->attributes['position'];
    }
}
