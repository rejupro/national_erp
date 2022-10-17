<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_invoice');
            $table->string('order_no');
            $table->string('payable');
            $table->string('balance');
            $table->string('paid');
            $table->string('due');
            $table->string('sales_date');
            $table->string('bank_id')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('caname')->nullable();
            $table->string('chbid')->nullable();
            $table->string('w_bid')->nullable();
            $table->string('mobid')->nullable();
            $table->string('trxid')->nullable();
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
        Schema::dropIfExists('sales_payments');
    }
}
