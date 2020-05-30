<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $casts = [
        'is_ordered' => 'boolean'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function isOrdered()
    {
        return $this->attributes['is_ordered'] === true;
    }
}
