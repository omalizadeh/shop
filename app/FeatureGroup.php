<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureGroup extends Model
{
    const FEATURE_GROUPS_TABLE = 'feature_groups';

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
