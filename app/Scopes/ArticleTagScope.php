<?php

namespace App\Scopes;

use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ArticleTagScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('type', Tag::ARTICLE_TAG);
    }
}
