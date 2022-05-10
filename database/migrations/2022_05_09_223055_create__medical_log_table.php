<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('medical_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weight');
            $table->string('Allergic');
            $table->string('situation');
            $table->string('chronic_diseases');
            $table->string('genetic_diseases');
            $table->string('surgery');
            $table->string('medicine');
            $table->text('notes');
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');//->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('_medical_log');
    }
}
