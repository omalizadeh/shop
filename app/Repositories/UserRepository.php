<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function paginate($perPage)
    {
        return User::paginate($perPage);
    }

    public function except(array $ids)
    {
        return User::whereNotIn('id', $ids)->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, $id)
    {
        return User::where('id', $id)->update($data);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    public function forceDestroy($id)
    {
        return DB::table('users')->delete($id);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function assignRole(User $user, $roleId)
    {
        return $user->roles()->attach($roleId);
    }

    public function removeRole(User $user, $roleId)
    {
        return $user->roles()->detach($roleId);
    }

    public function syncRoles(User $user, array $rolesId)
    {
        return $user->roles()->sync($rolesId);
    }
}
