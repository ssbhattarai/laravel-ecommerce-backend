<?php

use App\Order;
use App\OrderItem;
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
        $data1->billing_email = "admin@example.com";
        $data1->billing_name = "admin";
        $data1->billing_city = "ktm ";
        $data1->billing_province = "1";
        $data1->billing_phone = "989898989";
        $data1->save();


        $d2 = new Order;
        $d2->user_id = 2;
        $d2->billing_email = "user1@example.com";
        $d2->billing_name = "user1";
        $d2->billing_city = "ktm1";
        $d2->billing_province = "2";
        $d2->billing_phone = "1111111111";
        $d2->save();


        $d3 = new Order;
        $d3->user_id = 2;
        $d3->billing_email = "user2@example.com";
        $d3->billing_name = "user2";
        $d3->billing_city = "ktm2";
        $d3->billing_province = "3";
        $d3->billing_phone = "222222222222";
        $d3->save();



        $d4 = new Order;
        $d4->user_id = 2;
        $d4->billing_email = "user3@example.com";
        $d4->billing_name = "user3";
        $d4->billing_city = "ktm3";
        $d4->billing_province = "23";
        $d4->billing_phone = "33333";
        $d4->save();





        $d5 = new Order;
        $d5->user_id = 2;
        $d5->billing_email = "user5@example.com";
        $d5->billing_name = "user1";
        $d5->billing_city = "ktm";
        $d5->billing_province = "2";
        $d5->billing_phone = "1111111111";
        $d5->save();

        // $data1 = new OrderItem;
        // $data1->qty = 14;
        // $data1->save();
    }
}
