<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    const DROPDOWN_ATTRIBUTE = 1;
    const COLOR_ATTRIBUTE = 2;

    protected $casts = [
        'type' => 'integer'
    ];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getPosition()
    {
        return $this->attributes['position'];
    }

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function isDropdown()
    {
        return $this->getType() === self::DROPDOWN_ATTRIBUTE;
    }

    public function isColor()
    {
        return $this->getType() === self::COLOR_ATTRIBUTE;
    }
}
