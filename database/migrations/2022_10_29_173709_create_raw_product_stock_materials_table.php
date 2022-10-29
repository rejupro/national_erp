<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawProductStockMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_product_stock_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_batch');
            $table->string('material_id');
            $table->string('give_type');
            $table->string('given_amount');
            $table->string('packate_type');
            $table->string('packate_weight');
            $table->string('product_cost');
            $table->string('maked');
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
        Schema::dropIfExists('raw_product_stock_materials');
    }
}
