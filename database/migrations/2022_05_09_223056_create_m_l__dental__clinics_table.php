<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLDentalClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_l__dental__clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->Boolean('smoking');
            $table->String('Oral_Allergic');
            $table->unsignedInteger('medical_log_id');
            $table->foreign('medical_log_id')->references('id')->on('medical_log');
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
        Schema::dropIfExists('m_l__dental__clinics');
    }
}
