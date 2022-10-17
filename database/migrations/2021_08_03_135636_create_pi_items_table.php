<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pi_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pi_code');
            $table->string('item');
            $table->string('oty');
            $table->string('cost');
            $table->string('price');
            $table->string('p_id')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
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
        Schema::dropIfExists('pi_items');
    }
}
