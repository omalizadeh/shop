<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getSlug()
    {
        return $this->attributes['slug'];
    }
}
