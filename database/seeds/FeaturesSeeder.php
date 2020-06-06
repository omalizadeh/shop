<?php

use App\Feature;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    public function run()
    {
        Feature::create([
            'feature_group_id' => 1,
            'name' => 'ابعاد',
            'position' => 1
        ]);
        Feature::create([
            'feature_group_id' => 1,
            'name' => 'وزن',
            'position' => 2
        ]);
        Feature::create([
            'feature_group_id' => 3,
            'name' => 'وضوح',
            'position' => 3
        ]);
    }
}
