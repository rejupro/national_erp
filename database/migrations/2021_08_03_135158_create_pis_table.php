<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pi_code');
            $table->string('s_id')->nullable();
            $table->string('b_id')->nullable();
            $table->string('p_terms')->nullable();
            $table->string('issue_by')->nullable();
            $table->string('cur_type')->nullable();
            $table->string('pi_date')->nullable();
            $table->string('note')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
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
        Schema::dropIfExists('pis');
    }
}
