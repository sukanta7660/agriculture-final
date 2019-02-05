<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sell', function (Blueprint $table) {
            $table->increments('projectSellID');
            $table->string('descriptions')->nullable();
            $table->double('amount')->default(0);
            $table->integer('projectID')->unsigned()->index();
            $table->foreign('projectID')->references('projectID')->on('projects')->onDelete('cascade')->onUpdate('No Action');
            $table->softDeletes();
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
        Schema::dropIfExists('project_sell');
    }
}
