<?php

namespace App;

use App\Scopes\ArticleCategoryScope;

class ArticleCategory extends Category
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ArticleCategoryScope);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
