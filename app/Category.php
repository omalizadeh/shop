<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use FarsiTimestamps;

    const CATEGORIES_TABLE = 'categories';
    const PRODUCT_CATEGORY = true;
    const ARTICLE_CATEGORY = false;

    protected $table = 'categories';

    protected $casts = [
        'type' => 'boolean'
    ];

    protected $fillable = ['name', 'slug', 'parent_id', 'type'];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function childs()
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

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function isProductCategory()
    {
        return $this->getType() == self::PRODUCT_CATEGORY;
    }

    public function isArticleCategory()
    {
        return $this->getType() == self::ARTICLE_CATEGORY;
    }
}
