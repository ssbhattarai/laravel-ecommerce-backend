<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->unique();
            $table->unsignedBigInteger('user_id')->default('1');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('product_name');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('category_id')->on('categories');
            $table->longText('description');
            $table->string('weight');
            $table->integer('weight_type')->unsigned();
            $table->foreign('weight_type')->references('weight_type_id')->on('weight_types');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
