<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_tag');
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function getViews()
    {
        return $this->attributes['views'];
    }

    public function isActive()
    {
        return $this->attributes['is_active'] === true;
    }
}
