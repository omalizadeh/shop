<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'امید',
            'last_name' => 'ملاعلی زاده',
            'national_id' => '9828835252',
            'tel' => '02511111111',
            'mobile' => '09828835252',
            'birth_date' => '1995-02-05',
            'password' => bcrypt('123456'),
            'gender' => User::MALE_GENDER
        ]);
    }
}
