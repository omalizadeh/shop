<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    public function getSenderId()
    {
        return $this->attributes['user_id'];
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function getMessage()
    {
        return $this->attributes['message'];
    }
}
