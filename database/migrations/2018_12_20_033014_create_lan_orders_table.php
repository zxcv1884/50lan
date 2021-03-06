<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelanOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lan_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('order_address',64)->collation('utf8_general_ci')->nullable();
            $table->timestamp('order_at')->nullable();
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
        Schema::dropIfExists('lan_orders');
    }
}
