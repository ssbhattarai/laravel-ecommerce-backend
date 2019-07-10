<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id', 'product_name', 'type', 'weight', 'description'
    ];
}
