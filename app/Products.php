<?php

namespace App;

use APP\User;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id', 'product_name', 'type', 'weight', 'description', 'image', 'weight_type'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function weight_types()
    {
        return $this->hasmany(weightType::class);
    }
}
