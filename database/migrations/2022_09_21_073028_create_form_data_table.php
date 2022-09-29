<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("form_survey_id");
            $table->string('jenis_barang');
            $table->string('nama_barang');
            $table->string('type_merek')->nullable();
            $table->integer('qty');
            $table->string("ukur");
            $table->longText("keterangan")->nullable();
            $table->timestamps();
        });

        Schema::table('form_data', function (Blueprint $table){
            $table->foreign("form_survey_id")->references("id")->on("form_surveys")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_data');
    }
}
