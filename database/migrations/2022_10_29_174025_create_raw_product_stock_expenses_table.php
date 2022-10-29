<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawProductStockExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_product_stock_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_batch');
            $table->string('expense_id');
            $table->string('expense_price');
            $table->string('expense_quantity');
            $table->string('expense_total');
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
        Schema::dropIfExists('raw_product_stock_expenses');
    }
}
