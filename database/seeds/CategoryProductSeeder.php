<?php

use App\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::find(1);
        $product->categories()->attach(1, ['is_default' => true]);
        $product->categories()->attach(2);
        $product = Product::find(2);
        $product->categories()->attach(4);
        $product->categories()->attach(5, ['is_default' => true]);
    }
}
