<?php

namespace App\Traits;

use App\Classes\Persianalize;

trait FarsiTimestamps
{
    protected function getCreatedAtDate()
    {
        return Persianalize::farsiDate($this->attributes['created_at']);
    }

    protected function getCreatedAtDateTime()
    {
        return Persianalize::farsiDateTime($this->attributes['created_at']);
    }

    protected function getUpdatedAtDate()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDate($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDate();
        }
    }

    protected function getUpdatedAtDateTime()
    {
        if ($this->attributes['updated_at'] !== null) {
            return Persianalize::farsiDateTime($this->attributes['updated_at']);
        } else {
            return $this->getCreatedAtDateTime();
        }
    }
}
