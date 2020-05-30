<?php

namespace App;

use App\Scopes\ArticleTagScope;

class ArticleTag extends Tag
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ArticleTagScope);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
