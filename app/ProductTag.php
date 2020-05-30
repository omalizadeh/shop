<?php

namespace App;

use App\Scopes\ProductTagScope;

class ProductTag extends Tag
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ProductTagScope);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
