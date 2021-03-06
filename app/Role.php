<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getFarsiName()
    {
        switch ($this->getName()) {
            case 'admin':
                return 'مدیر';
            case 'operator':
                return 'اپراتور';
            case 'customer':
                return 'مشتری';
            default:
                return $this->getName();
        }
    }
}
