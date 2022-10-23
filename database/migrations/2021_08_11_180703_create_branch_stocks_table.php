<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_id');
            $table->string('product_id');
            $table->string('invoice');
            $table->string('quantity');
            $table->string('purchase_qty')->nullable();
            $table->string('recv_qty')->nullable();
            $table->string('rest_qty')->nullable();
            $table->string('sold_qty')->nullable();
            $table->string('deli_qty')->nullable();
            $table->string('return_qty')->nullable();
            $table->string('dp_qty')->nullable();
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
        Schema::dropIfExists('branch_stocks');
    }
}
