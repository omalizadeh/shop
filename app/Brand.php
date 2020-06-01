<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use FarsiTimestamps;

    const BRANDS_TABLE = 'brands';

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
