<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('user_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onDelete('set null')->onUpdate('cascade');
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_city');
            $table->string('billing_province');
            $table->string('billing_phone');
            $table->integer('billing_method');
            $table->boolean('shipped')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
