<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelanDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lan_drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->char('drink',6)->collation('utf8_general_ci');
            $table->integer('drink_price');
            $table->timestamps();
        });

        Schema::table('lan_drinks', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('lan_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lan_drinks');
    }
}
