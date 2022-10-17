<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('acc_no')->nullable();
            $table->string('type')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('amount')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('balance')->nullable();
            $table->string('description')->nullable();
            $table->string('uid')->nullable();
            $table->string('brid')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
