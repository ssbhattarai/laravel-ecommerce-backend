<?php

namespace App;

use APP\User;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id', 'product_name', 'type', 'weight', 'description', 'image'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
