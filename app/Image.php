<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    const IMAGES_TABLE = 'images';
    const PRODUCT_IMAGE_DIR = 'product-images';

    protected $fillable = ['path', 'alt', 'position', 'is_cover'];

    protected $casts = [
        'is_cover' => 'boolean'
    ];

    public function imageable()
    {
        $this->morphTo('imageable');
    }

    public function getPath()
    {
        return $this->attributes['path'];
    }

    public function getAlt()
    {
        return $this->attributes['alt'];
    }

    public function getPosition()
    {
        return $this->attributes['position'];
    }

    public function isCover()
    {
        return $this->attributes['is_cover'] === true;
    }

    public function getType()
    {
        return $this->attributes['imageable_type'];
    }

    public function getURL()
    {
        return "uploads/" . $this->getPath();
    }
}
