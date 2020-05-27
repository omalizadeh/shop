<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Carbon\Carbon;
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

    public function delete($id)
    {
        return DB::table('users')->delete($id);
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }
}
