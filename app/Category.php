<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'category_id', 'category_name'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
