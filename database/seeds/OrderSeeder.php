<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = new Order;
        $data1->user_id = 1;
        $data1->billing_email = "data1@example.com";
        $data1->billing_name = "data1";
        $data1->billing_city = "ktm ";
        $data1->billing_province = "3";
        $data1->billing_phone = "989898989";
        $data1->save();

        $data2 = new Order;
        $data2->user_id = 1;
        $data2->billing_email = "data2@example.com";
        $data2->billing_name = "data2";
        $data2->billing_city = "lalitpur ";
        $data2->billing_province = "4";
        $data2->billing_phone = "989898989";
        $data2->save();

        $data3 = new Order;
        $data3->user_id = 1;
        $data3->billing_email = "data3@example.com";
        $data3->billing_name = "data3";
        $data3->billing_city = "lalitpur ";
        $data3->billing_province = "4";
        $data3->billing_phone = "989898989";
        $data3->save();
    }
}
