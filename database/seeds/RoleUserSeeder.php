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
        $customer = User::find(2);
        $customer->roles()->attach(2);
    }
}
