<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class, 'feature_group_id');
    }
}
