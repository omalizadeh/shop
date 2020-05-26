<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING_PAYMENT = 1;
    const PACKING = 2;
    const SENT = 3;
    const DELIVERED = 4;
    const CANCELED = 5;
}
