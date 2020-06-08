<?php

namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface
{
    public function all();

    public function except(array $ids);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function findById($id);
}
