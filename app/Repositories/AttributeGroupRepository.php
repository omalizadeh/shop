<?php

namespace App\Repositories;

use App\AttributeGroup;
use App\Repositories\Interfaces\AttributeGroupRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AttributeGroupRepository implements AttributeGroupRepositoryInterface
{
    public function all()
    {
        return AttributeGroup::all();
    }

    public function allOrderBy($orderBy = 'id')
    {
        return AttributeGroup::orderBy($orderBy, 'ASC')->get();
    }

    public function paginate($perPage)
    {
        return AttributeGroup::paginate($perPage);
    }

    public function except(array $ids)
    {
        return AttributeGroup::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return AttributeGroup::create($data);
    }

    public function update(array $data, $id)
    {
        return AttributeGroup::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(AttributeGroup::ATTRIBUTE_GROUPS_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return AttributeGroup::findOrFail($id);
    }

    public function findByPosition($position)
    {
        return AttributeGroup::where('position', $position)->first();
    }

    public function nextPosition()
    {
        return AttributeGroup::max('position') + 1;
    }

    public function updateAndSwapPosition(AttributeGroup $attributeGroup, array $data)
    {
        return DB::transaction(function () use ($data, $attributeGroup) {
            AttributeGroup::where('position', $data['position'])->update(['position' => $attributeGroup->getPosition()]);
            $this->update($data, $attributeGroup->id);
        });
    }
}
