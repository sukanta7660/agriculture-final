<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeExpanseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inexp_cat', function (Blueprint $table) {
            $table->increments('inexpCatID');
            $table->string('name',100)->nullable();
            $table->integer('projectID')->unsigned()->index();
            $table->foreign('projectID')->references('projectID')->on('projects')->onDelete('cascade')->onUpdate('No Action');
            $table->unique(['name', 'projectID']);
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
        Schema::dropIfExists('inexp_cat');
    }
}
