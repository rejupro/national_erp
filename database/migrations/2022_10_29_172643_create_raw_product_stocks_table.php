<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_product_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_batch');
            $table->string('product_id');
            $table->string('product_cost');
            $table->string('packate_expense');
            $table->string('well_product');
            $table->string('other_expense')->default('0');
            $table->string('deduction_expense')->default('0');
            $table->string('wasted_product')->default('0');
            $table->string('extra_product')->default('0');
            $table->string('total_ready_product');
            $table->string('sell_product')->default('0');
            $table->string('stock_status')->default('0');
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
        Schema::dropIfExists('raw_product_stocks');
    }
}
