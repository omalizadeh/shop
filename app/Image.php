<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $casts = [
        'is_cover' => 'boolean'
    ];

    public function imageable()
    {
        $this->morphTo('imageable');
    }

    public function getName()
    {
        return $this->attributes['name'];
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

    public function getPath()
    {
        $path = public_path('uploads');
        switch ($this->getType()) {
            case "App\Product":
                return $path . 'products/' . $this->getName();
            default:
                return $path . $this->getName();
        }
    }
}
