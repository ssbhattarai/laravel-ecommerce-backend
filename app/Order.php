<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{

    protected $fillable = [
        'id', 'billing_email', 'billing_name', 'billing_city', 'billing_province', 'billing_phone',
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
