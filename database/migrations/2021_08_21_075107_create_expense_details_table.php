<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_no');
            $table->string('other_credits');
            $table->string('expense_head');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->double('amount',8,2);
            $table->string('ref')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
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
        Schema::dropIfExists('expense_details');
    }
}
