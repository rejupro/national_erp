<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->integer('parent_id')->nullable();
            $table->integer('cat_id');
            $table->integer('sub_cat_id');
            $table->integer('brand_id');
            $table->integer('manufac_id');
            $table->integer('unit_id');
            $table->string('pur_scan');
            $table->integer('country_id');
            $table->enum('status', ['0', '1']);
            $table->string('certificate');
            $table->string('min_stock');
            $table->string('model');
            $table->string('cost');
            $table->string('brand_no');
            $table->string('price');
            $table->string('w_day');
            $table->string('barcode');
            $table->string('description');
            $table->string('avater');
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
        Schema::dropIfExists('products');
    }
}
