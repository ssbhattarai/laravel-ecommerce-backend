<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fruits = new Category;
        $fruits->category_id = '1';
        $fruits->category_name = 'Fruits';
        $fruits->save();

        $veg = new Category;
        $veg->category_id = '2';
        $veg->category_name = 'Vegetables';
        $veg->save();

        $animals = new Category;
        $animals->category_id = '3';
        $animals->category_name = 'Animals';
        $animals->save();
    }
}
