<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }
}
