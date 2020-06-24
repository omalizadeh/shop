<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use FarsiTimestamps;

    const CARTS_TABLE = 'carts';

    protected $fillable = [
        'user_id',
        'total'
    ];

    protected $casts = [
        'is_ordered' => 'boolean'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
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
