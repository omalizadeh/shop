<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const PRODUCT_CATEGORY = true;
    const ARTICLE_CATEGORY = false;

    protected $table = 'categories';

    public function parentCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class);
    }
}
