<?php

namespace App\Traits;

use App\Classes\Persianalize;

trait FarsiTimestamps
{
    protected function getFarsiCreatedAtDate()
    {
        return Persianalize::farsiDate($this->attributes['created_at']);
    }

    protected function getFarsiCreatedAtDateTime()
    {
        return Persianalize::farsiDateTime($this->attributes['created_at']);
    }

    protected function getFarsiUpdatedAtDate()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDate($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDate();
        }
    }

    protected function getFarsiUpdatedAtDateTime()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDateTime($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDateTime();
        }
    }
}
