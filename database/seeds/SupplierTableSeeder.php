<?php

use Illuminate\Database\Seeder;
use App\Suppliers;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new Suppliers;
        $test->supplier_name = "Shyam Sundar Bhattarai";
        $test->supplier_address  = "Imadol";
        $test->main_product = "Apple, Banana, Cauli";
        $test->supplier_phone = 9843613596;
        $test->save();
    }
}
