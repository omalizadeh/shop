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

        User::create([
            'first_name' => 'اصغر',
            'last_name' => 'اکبری',
            'national_id' => '9822835442',
            'tel' => '02511111331',
            'mobile' => '09128835252',
            'birth_date' => '1998-07-01',
            'password' => bcrypt('123456'),
            'gender' => User::UNSPECIFIED_GENDER
        ]);

        User::create([
            'first_name' => 'مریم',
            'last_name' => 'مهرابی',
            'national_id' => '0022835442',
            'tel' => '02566611331',
            'mobile' => '09132235252',
            'birth_date' => '1996-07-01',
            'password' => bcrypt('123456'),
            'gender' => User::FEMALE_GENDER
        ]);
    }
}
