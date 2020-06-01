<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function paginate($perPage)
    {
        return Product::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Product::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        return Product::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Product::PRODUCTS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }
}
