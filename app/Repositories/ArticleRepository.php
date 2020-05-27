<?php

namespace App\Repositories;

use App\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function paginate($perPage)
    {
        return Article::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Article::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Article::create($data);
    }

    public function update(array $data, $id)
    {
        return Article::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Article::ARTICLE_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Article::findOrFail($id);
    }
}
