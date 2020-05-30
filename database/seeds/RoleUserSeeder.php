<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::find(1);
        $admin->roles()->attach(1);
        $operator = User::find(2);
        $operator->roles()->attach(2);
        $customer = User::find(3);
        $customer->roles()->attach(3);
    }
}
