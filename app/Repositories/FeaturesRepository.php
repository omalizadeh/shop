<?php

namespace App\Repositories;

use App\Features;
use App\Repositories\Interfaces\FeaturesRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FeaturesRepository implements FeaturesRepositoryInterface
{
    public function all()
    {
        return Features::all();
    }

    public function paginate($perPage)
    {
        return Features::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Features::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Features::create($data);
    }

    public function update(array $data, $id)
    {
        return Features::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Features::FEATURES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Features::findOrFail($id);
    }
}
