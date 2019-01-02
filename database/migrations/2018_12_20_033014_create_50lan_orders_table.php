<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create50lanOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('50lan_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('order_address',64)->collation('utf8_general_ci');
            $table->timestamp('order_at');
            $table->timestamp('order_finish_at')->nullable();
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
        Schema::dropIfExists('50lan_orders');
    }
}
