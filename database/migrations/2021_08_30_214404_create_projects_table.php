<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pgid');
            $table->string('psgid');
            $table->string('project_id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('cperson')->nullable();
            $table->string('cnumber')->nullable();
            $table->string('prjdetails')->nullable();
            $table->string('prjamount')->nullable();
            $table->string('prjexamount')->nullable();
            $table->string('prjtype')->nullable();
            $table->string('coid')->nullable();
            $table->string('coamount')->nullable();
            $table->string('client')->nullable();
            $table->string('status')->nullable();
            $table->string('uid')->nullable();
            $table->string('brid')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
