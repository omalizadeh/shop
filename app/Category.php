<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use FarsiTimestamps;

    const PRODUCT_CATEGORY = true;
    const ARTICLE_CATEGORY = false;

    protected $table = 'categories';

    protected $casts = [
        'type' => 'boolean'
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class);
    }

    public function getParentId()
    {
        return $this->attributes['parent_id'];
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
