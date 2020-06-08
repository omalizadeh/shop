<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;

class User extends Authenticatable
{
    use Notifiable, FarsiTimestamps, SoftDeletes;

    const UNSPECIFIED_GENDER = 1;
    const MALE_GENDER = 2;
    const FEMALE_GENDER = 3;

    protected $fillable = [
        'first_name', 'last_name', 'national_id', 'birth_date', 'email', 'gender', 'mobile', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'mobile_verified_at' => 'datetime',
        'gender' => 'integer'
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getNationalId()
    {
        return $this->attributes['national_id'];
    }

    public function getFirstName()
    {
        return $this->attributes['first_name'];
    }

    public function getLastName()
    {
        return $this->attributes['last_name'];
    }

    public function getTel()
    {
        return $this->attributes['tel'];
    }

    public function getMobile()
    {
        return $this->attributes['mobile'];
    }

    public function getBirthDate()
    {
        return $this->attributes['birth_date'];
    }

    public function getGender()
    {
        return $this->attributes['gender'];
    }

    public function isMale()
    {
        return $this->getGender() === self::MALE_GENDER;
    }

    public function isFemale()
    {
        return $this->getGender() === self::FEMALE_GENDER;
    }

    public function isOnline()
    {
        if (Cache::has('user-is-online-' . $this->id)) {
            return true;
        } else {
            return false;
        }
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasAnyRoles(array $roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
