<?php

namespace App\Scopes;

use App\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ArticleCategoryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('type', Category::ARTICLE_CATEGORY);
    }
}
