<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class);
    }
}
