<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'id', 'supplier_name', 'supplier_address', 'main_product', 'supplier_phone',
    ];
}
