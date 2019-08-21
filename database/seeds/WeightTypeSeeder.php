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

        $muri = new WeightType;
        $muri->weight_type_id = 2;
        $muri->weight_type_name = "Muri";
        $muri->save();


        $pathi = new WeightType;
        $pathi->weight_type_id = 3;
        $pathi->weight_type_name = "Pathi";
        $pathi->save();

        $mana = new WeightType;
        $mana->weight_type_id = 4;
        $mana->weight_type_name = "Mana";
        $mana->save();


        $dharni = new WeightType;
        $dharni->weight_type_id = 5;
        $dharni->weight_type_name = "Dharni";
        $dharni->save();

        $ota = new WeightType;
        $ota->weight_type_id = 6;
        $ota->weight_type_name = "Ota";
        $ota->save();
    }
}
