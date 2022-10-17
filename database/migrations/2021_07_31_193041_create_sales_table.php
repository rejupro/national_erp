<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_invoice');
            $table->string('payable');
            $table->string('balance');
            $table->string('paid');
            $table->string('sales_date');
            $table->string('next_date');
            $table->string('product_store');
            $table->string('ref');
            $table->string('project_id');
            $table->string('note');
            $table->string('lc_no');
            $table->string('pi_no');
            $table->string('lc_value');
            $table->string('lc_date');
            $table->string('pi_date');
            $table->string('lc_bank');
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
        Schema::dropIfExists('sales');
    }
}
