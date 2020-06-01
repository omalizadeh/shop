<?php

namespace App;

use App\Traits\FarsiTimestamps;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, FarsiTimestamps;

    const UNSPECIFIED_GENDER = 1;
    const MALE_GENDER = 2;
    const FEMALE_GENDER = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
