<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use APP\Products;
class weightType extends Model
{
    protected $fillable = [
        'id', 'weight_id', 'weight_type'
    ];
     public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
