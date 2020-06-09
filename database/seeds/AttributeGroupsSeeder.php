<?php

use App\AttributeGroup;
use Illuminate\Database\Seeder;

class AttributeGroupsSeeder extends Seeder
{
    public function run()
    {
        AttributeGroup::create([
            'name' => 'رنگ',
            'type' => AttributeGroup::COLOR_ATTRIBUTE,
            'position' => 1
        ]);
        AttributeGroup::create([
            'name' => 'رم',
            'type' => AttributeGroup::DROPDOWN_ATTRIBUTE,
            'position' => 2
        ]);
        AttributeGroup::create([
            'name' => 'حافظه داخلی',
            'type' => AttributeGroup::DROPDOWN_ATTRIBUTE,
            'position' => 3
        ]);
    }
}
