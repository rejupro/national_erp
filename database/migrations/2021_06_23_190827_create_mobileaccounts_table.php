<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobileaccounts', function (Blueprint $table) {
            $table->bigIncrements('id');        
            $table->string('mname');
            $table->string('bname')->nullable();
            $table->string('mobile');
            $table->string('doposit')->nullable();
            $table->string('widrawn')->nullable();
            $table->string('balance')->nullable();
            $table->string('brid')->nullable();
            $table->string('uid')->nullable();
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
        Schema::dropIfExists('mobileaccounts');
    }
}
