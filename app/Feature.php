<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class, 'feature_group_id');
    }

    public function getFeatureGroupId()
    {
        return $this->attributes['feature_group_id'];
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
