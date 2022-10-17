<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_balance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('req_id');
            $table->string('project_id')->nullable();
            $table->string('pay_id')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('balance')->nullable();
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
        Schema::dropIfExists('employee_balance');
    }
}
