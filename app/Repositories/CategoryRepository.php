<?php

namespace App\Repositories;

use App\ArticleCategory;
use App\Category;
use App\ProductCategory;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function allProductCategories()
    {
        return ProductCategory::all();
    }

    public function allArticleCategories()
    {
        return ArticleCategory::all();
    }

    public function paginate($perPage)
    {
        return Category::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Category::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(array $data, $id)
    {
        return Category::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Category::CATEGORIES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    public function parent(Category $category)
    {
        return $category->parent;
    }
}
