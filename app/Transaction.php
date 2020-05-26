<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const PENDING = 1;
    const SUCCESSFUL = 2;
    const FAILED = 3;
}
