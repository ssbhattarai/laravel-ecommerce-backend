<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use APP\Products;

use APP\Order;

class OrderItem extends Model
{
    protected $fillable = [
        'id', 'qty'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
