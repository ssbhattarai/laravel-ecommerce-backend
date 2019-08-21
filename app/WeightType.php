<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightType extends Model
{
    public function products()
    {
        return $this->hasMany(WeightType::class);
    }
}
