<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requsition_id');
            $table->string('project_id')->nullable();
            $table->enum('status',['Pending','Approve']);
            $table->string('code');
            $table->string('stf_id')->nullable();
            $table->string('dsgn_id')->nullable();
            $table->string('cnumber')->nullable();
            $table->string('cemail')->nullable();
            $table->text('address')->nullable();
            $table->text('brid')->nullable();
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
        Schema::dropIfExists('return_requisitions');
    }
}
