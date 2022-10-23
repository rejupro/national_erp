<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeReadsTable extends Migration
{
    /**
     * Run the migrations.
     *'read_date','bike_no','open_read','oil_cost','end_read','service_cost','comments','created_by'
     * @return void
     */
    public function up()
    {
        Schema::create('bike_reads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('read_date');
            $table->string('bike_no');
            $table->string('open_read');
            $table->string('oil_cost');
            $table->string('end_read');
            $table->string('service_cost');
            $table->string('comments');
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
        Schema::dropIfExists('bike_reads');
    }
}
