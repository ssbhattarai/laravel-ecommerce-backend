<?php

use App\WeightType;
use Illuminate\Database\Seeder;

class WeightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kg = new WeightType;
        $kg->weight_type_id = 1;
        $kg->weight_type_name = "Kg";
        $kg->save();
    }
}
