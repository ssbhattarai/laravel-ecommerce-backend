<?php

namespace App;

use APP\User;
use Illuminate\Database\Eloquent\Model;
use APP\Category;

class Products extends Model
{
    protected $fillable = [
        'id', 'product_name', 'type', 'weight', 'description', 'image', 'weight_type'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function weight_type()
    {
        return $this->belongsTo(WeightType::class);
    }
}
