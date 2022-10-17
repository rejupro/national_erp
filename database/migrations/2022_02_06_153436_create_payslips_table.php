<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id');
            $table->string('month');
            $table->string('branch_id');
            $table->string('salary');
            $table->string('present_day');
            $table->string('absent_day');
            $table->string('due_salary');
            $table->string('fine');
            $table->string('loan');
            $table->string('salary_advance');
            $table->string('commission');
            $table->string('net_payable');
            $table->string('remark');
            $table->string('created_by');
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
        Schema::dropIfExists('payslips');
    }
}
