<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use FarsiTimestamps;

    const PRODUCTS_TABLE = 'products';

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'brand_id',
        'slug',
        'meta_title',
        'meta_description',
        'insta_link',
        'stock',
        'price',
        'weight'
    ];

    protected $casts = [
        'on_sale' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'category_product', 'product_id', 'category_id')->withPivot('is_default');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_product')->withPivot('value')->orderBy('position', 'ASC');
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_tag');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getBrandId()
    {
        return $this->attributes['brand_id'];
    }

    public function getBarcode()
    {
        return $this->attributes['barcode'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function getWeight()
    {
        return $this->attributes['weight'];
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function getAvgRate()
    {
        return $this->attributes['avg_rate'];
    }

    public function getSlug()
    {
        return $this->attributes['slug'];
    }

    public function getViews()
    {
        return $this->attributes['views'];
    }

    public function getMetaTitle()
    {
        return $this->attributes['meta_title'];
    }

    public function getMetaDescription()
    {
        return $this->attributes['meta_description'];
    }

    public function getInstaLink()
    {
        return $this->attributes['insta_link'];
    }

    public function getTotalSold()
    {
        return $this->attributes['total_sold'];
    }

    public function isOnSale()
    {
        return $this->attributes['on_sale'] == true;
    }

    public function isActive()
    {
        return $this->attributes['is_active'] == true;
    }

    public function getBrandName()
    {
        if ($this->brand) {
            return  $this->brand->getName();
        } else {
            return null;
        }
    }

    public function getDefaultCategory()
    {
        return $this->categories()->wherePivot('is_default', true)->first();
    }

    public function getDefaultCategoryName()
    {
        $category = $this->categories()->wherePivot('is_default', true)->first();
        if ($category) {
            return $category->getName();
        } else {
            return null;
        }
    }

    public function hasImages()
    {
        return $this->images()->count() > 0;
    }
}
