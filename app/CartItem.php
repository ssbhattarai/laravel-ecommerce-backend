<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use APP\Products;

class CartItem extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
