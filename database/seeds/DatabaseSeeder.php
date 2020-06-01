<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(BrandsSeeder::class);
    }
}
