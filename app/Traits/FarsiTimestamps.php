<?php

namespace App\Traits;

use App\Classes\Persianalize;

trait FarsiTimestamps
{
    public function getFarsiCreatedAtDate()
    {
        return Persianalize::farsiDate($this->attributes['created_at']);
    }

    public function getFarsiCreatedAtDateTime()
    {
        return Persianalize::farsiDateTime($this->attributes['created_at']);
    }

    public function getFarsiUpdatedAtDate()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDate($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDate();
        }
    }

    public function getFarsiUpdatedAtDateTime()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDateTime($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDateTime();
        }
    }
}
