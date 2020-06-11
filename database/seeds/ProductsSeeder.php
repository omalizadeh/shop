<?php

use App\Product;
use App\Role;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'brand_id' => 1,
            'barcode' => "F626014770382S8",
            'name' => "کرم مرطوب کننده",
            'description' => "کرم مرطوب کننده و التیام بخش دست و صورت سنسی",
            'slug' => "kerem",
        ]);
        Product::create([
            'brand_id' => 2,
            'barcode' => "F6SS01477AA82S8",
            'name' => "کرم مرطوب 2",
            'description' => "کرم مرطوب کننده و التیام بخش دست و صورت سنسی",
            'slug' => "kerem2",
        ]);
    }
}
