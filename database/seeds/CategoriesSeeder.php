<?php

use App\ArticleCategory;
use App\Category;
use App\ProductCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        ProductCategory::create([
            'name' => 'ست ورزشی',
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'sport-sets'
        ]);
        ProductCategory::create([
            'name' => 'ست ورزشی مردانه',
            'parent_id' => 1,
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'male-sport-sets'
        ]);
        ProductCategory::create([
            'name' => 'ست ورزشی زنانه',
            'parent_id' => 1,
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'female-sport-sets'
        ]);
        ProductCategory::create([
            'name' => 'لپ تاپ',
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'laptops'
        ]);
        ProductCategory::create([
            'name' => 'لپ تاپ ASUS',
            'parent_id' => 4,
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'asus-laptops'
        ]);
        ProductCategory::create([
            'name' => 'لپ تاپ Lenovo',
            'parent_id' => 4,
            'type' => Category::PRODUCT_CATEGORY,
            'slug' => 'lenovo-laptops'
        ]);
        ArticleCategory::create([
            'name' => 'آموزشی',
            'type' => Category::ARTICLE_CATEGORY,
            'slug' => 'tutorial'
        ]);
        ArticleCategory::create([
            'name' => 'اخبار',
            'type' => Category::ARTICLE_CATEGORY,
            'slug' => 'news'
        ]);
    }
}
