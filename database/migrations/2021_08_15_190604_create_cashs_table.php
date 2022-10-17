<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inv_no');
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('balance')->nullable();
            $table->string('uid')->nullable();
            $table->string('bid')->nullable();
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
        Schema::dropIfExists('cashs');
    }
}
