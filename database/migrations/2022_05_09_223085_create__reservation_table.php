<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('reception_id');
            $table->foreign('reception_id')->references('id')->on('receptions');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');//->onDelete('cascade')->onUpdate('cascade');
            $table->date('Date');
            $table->boolean('status');
            $table->boolean('Confirmation');
            $table->integer('offset');
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
        Schema::dropIfExists('_reservation');
    }
}
