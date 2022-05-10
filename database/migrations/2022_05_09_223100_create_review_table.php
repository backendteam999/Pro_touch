<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations');//->onDelete('cascade')->onUpdate('cascade');
            $table->text('notes');
            $table->date('date');
            $table->text('next_view');
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
        Schema::dropIfExists('review');
    }
}
