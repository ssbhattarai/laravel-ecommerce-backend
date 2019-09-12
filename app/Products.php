<?php

namespace App;

use APP\User;
use Illuminate\Database\Eloquent\Model;
use APP\Category;
use APP\OrderItem;
use APP\Order;



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
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function getProductNameAttributes($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttributes($value)
    {
        return ucwords($value);
    }
}
