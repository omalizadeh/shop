<?php

namespace App;

use App\Scopes\ProductCategoryScope;

class ProductCategory extends Category
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ProductCategoryScope);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }
}
