<?php

use Illuminate\Database\Seeder;
use App\weightType;
class WeightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $kg = new weightType;
         $kg->weight_id = '1';
         $kg->weight_name = 'Kg';
         $kg->save();


         $pathi = new weightType;
         $pathi->weight_id = '2';
         $pathi->weight_name = 'Pathi';
         $pathi->save();

         $Mana = new weightType;
         $Mana->weight_id = '3';
         $Mana->weight_name = 'Mana';
         $Mana->save();

         $dharni = new weightType;
         $dharni->weight_id = '4';
         $dharni->weight_name = 'Dharni';
         $dharni->save();
            
    }
}
