<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('record_no')->nullable();
            $table->string('cookie_id');
            $table->string('challan_date')->nullable();
            $table->string('ref')->nullable();
            $table->string('send_person_id')->nullable();
            $table->string('send_person_name')->nullable();
            $table->string('note')->nullable();
            $table->string('item_id');
            $table->string('item_name');
            $table->string('cost');
            $table->string('quantity');
            $table->string('price');
            $table->string('project_id');
            $table->string('project_name');
            $table->string('freight_amount');
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
        Schema::dropIfExists('material_uses');
    }
}
