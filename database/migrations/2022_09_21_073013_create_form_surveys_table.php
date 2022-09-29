<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_surveys', function (Blueprint $table) {
            $table->id();
            $table->string("nama_project")->nullable();
            $table->string("lokasi")->nullable();
            $table->string("nama_pic")->nullable();
            $table->string("nama_surveyor")->nullable();
            $table->string("nama_sales")->nullable();
            $table->timestamp("tgl_survey")->useCurrent();
            $table->string("no_survey")->nullable();
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
        Schema::dropIfExists('form_surveys');
    }
}
