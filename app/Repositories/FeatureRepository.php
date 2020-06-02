<?php

namespace App\Repositories;

use App\Feature;
use App\Repositories\Interfaces\FeatureRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FeatureRepository implements FeatureRepositoryInterface
{
    public function all()
    {
        return Feature::all();
    }

    public function paginate($perPage)
    {
        return Feature::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Feature::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Feature::create($data);
    }

    public function update(array $data, $id)
    {
        return Feature::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Feature::FEATURES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Feature::findOrFail($id);
    }
}
