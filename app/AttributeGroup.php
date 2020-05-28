<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
