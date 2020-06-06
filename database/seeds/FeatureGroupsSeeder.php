<?php

use App\FeatureGroup;
use Illuminate\Database\Seeder;

class FeatureGroupsSeeder extends Seeder
{
    public function run()
    {
        FeatureGroup::create([
            'name' => 'مشخصات فیزیکی',
            'position' => 1
        ]);
        FeatureGroup::create([
            'name' => 'سایر مشخصات',
            'position' => 2
        ]);
        FeatureGroup::create([
            'name' => 'صفحه نمایش',
            'position' => 3
        ]);
    }
}
