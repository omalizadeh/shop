<?php

namespace App\Repositories;

use App\FeatureGroup;
use App\Repositories\Interfaces\FeatureGroupRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FeatureGroupRepository implements FeatureGroupRepositoryInterface
{
    public function all()
    {
        return FeatureGroup::all();
    }

    public function paginate($perPage)
    {
        return FeatureGroup::paginate($perPage);
    }

    public function except(array $ids)
    {
        return FeatureGroup::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return FeatureGroup::create($data);
    }

    public function update(array $data, $id)
    {
        return FeatureGroup::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(FeatureGroup::FEATURE_GROUPS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return FeatureGroup::findOrFail($id);
    }

    public function findByPosition($position)
    {
        return FeatureGroup::where('position', $position)->first();
    }

    public function nextPosition()
    {
        return FeatureGroup::max('position') + 1;
    }
}
