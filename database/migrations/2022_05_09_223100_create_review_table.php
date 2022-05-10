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
            $table->id();
            $table->unsignedInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('_patient');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('_doctor');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('_clinic');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('_services');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('_reservation');//->onDelete('cascade')->onUpdate('cascade');
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
