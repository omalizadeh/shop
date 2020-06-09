<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class);
    }

    public function getAttributeGroupId()
    {
        return $this->attributes['attribute_group_id'];
    }

    public function getValue()
    {
        return $this->attributes['value'];
    }

    public function getColor()
    {
        return $this->attributes['color'];
    }
}
