<?php

namespace App\Repositories;

use App\Attribute;
use App\Repositories\Interfaces\AttributeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AttributeRepository implements AttributeRepositoryInterface
{
    public function all()
    {
        return Attribute::all();
    }

    public function allOrderBy($orderBy = 'id')
    {
        return Attribute::orderBy($orderBy, 'ASC')->get();
    }

    public function paginate($perPage)
    {
        return Attribute::paginate($perPage);
    }

    public function except(array $ids)
    {
        return Attribute::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Attribute::create($data);
    }

    public function update(array $data, $id)
    {
        return Attribute::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Attribute::ATTRIBUTES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Attribute::findOrFail($id);
    }

    public function findByPosition($position)
    {
        return Attribute::where('position', $position)->first();
    }

    public function attributes(Attribute $attribute)
    {
        return $attribute->attributes;
    }

    public function nextPosition()
    {
        return Attribute::max('position') + 1;
    }

    public function updateAndSwapPosition(Attribute $attribute, array $data)
    {
        return DB::transaction(function () use ($data, $attribute) {
            Attribute::where('position', $data['position'])->update(['position' => $attribute->getPosition()]);
            $this->update($data, $attribute->id);
        });
    }
}
