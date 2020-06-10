<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    const ATTRIBUTES_TABLE = 'attributes';

    protected $fillable = [
        'value', 'attribute_group_id', 'color'
    ];

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

    public function isColor()
    {
        return $this->attributeGroup->isColor();
    }
}
