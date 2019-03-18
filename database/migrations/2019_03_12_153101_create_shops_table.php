<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('flour');
            $table->dateTime('open_time')->nullable(); 
            $table->dateTime('close_time')->nullable();

            $table->integer('shop_status_id')->unsigned();
            $table->foreign('shop_status_id')->references('id')->on('shop_statuses')->onDelete('cascade');

            $table->integer('min_order_cost')->default('0');

            $table->integer('mall_id')->unsigned();
            $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');

           
            
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
        Schema::dropIfExists('shops');
    }
}
