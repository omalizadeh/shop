<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const PRODUCT_TAG = true;
    const ARTICLE_TAG = false;
}
