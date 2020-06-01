<?php

namespace App\Repositories;

use App\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BrandRepository implements BrandRepositoryInterface
{
    public function all()
    {
        return Brand::all();
    }

    public function paginate($perPage)
    {
        return Brand::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Brand::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function update(array $data, $id)
    {
        return Brand::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Brand::BRANDS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Brand::findOrFail($id);
    }
}
