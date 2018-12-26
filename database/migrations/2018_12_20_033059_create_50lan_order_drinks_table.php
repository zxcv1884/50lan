<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create50lanOrderDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('50lan_order_drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drink_id')->unsigned();
            $table->char('drink_ice',2)->collation('utf8_general_ci');
            $table->char('drink_sugar',2)->collation('utf8_general_ci');
            $table->integer('order_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('50lan_order_drinks', function (Blueprint $table) {
            $table->foreign('drink_id')->references('id')->on('50lan_drinks');
            $table->foreign('order_id')->references('id')->on('50lan_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('50lan_order_drinks');
    }
}
