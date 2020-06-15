<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    const FEATURES_TABLE = 'features';

    protected $fillable = ['feature_group_id', 'name', 'position'];

    public function featureGroup()
    {
        return $this->belongsTo(FeatureGroup::class, 'feature_group_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'feature_product');
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

    public function getFeatureGroupName()
    {
        return $this->featureGroup->getName();
    }
}
