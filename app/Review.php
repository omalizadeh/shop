<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use FarsiTimestamps;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function getReview()
    {
        return $this->attributes['review'];
    }

    public function getRate()
    {
        return $this->attributes['rate'];
    }
}
