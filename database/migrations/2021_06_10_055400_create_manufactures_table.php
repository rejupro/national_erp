<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufactures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacture_name');
            $table->string('c_person');
            $table->integer('c_mobile');
            $table->string('c_email');
            $table->string('address');
            $table->string('main_product');
            $table->longText('description');
            $table->text('web');
            $table->text('rank');
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
        Schema::dropIfExists('manufactures');
    }
}
