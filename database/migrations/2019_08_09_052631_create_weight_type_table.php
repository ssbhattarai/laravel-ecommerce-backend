<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('weight_id')->unsigned();
            // $table->integer('products_weight_id');
            // $table->foreign('products_weight_id')->references('weight_type')->on('products')->onDelete('cascade');
            $table->string('weight_name', 100);
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
        Schema::dropIfExists('weight_type');
    }
}
