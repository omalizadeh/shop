<?php

namespace App\Repositories;

use App\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function except(array $ids)
    {
        return Role::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function update(array $data, $id)
    {
        return Role::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table(Role::ROLES_TABLE)->delete($id);
    }

    public function findById($id)
    {
        return Role::findOrFail($id);
    }
}
