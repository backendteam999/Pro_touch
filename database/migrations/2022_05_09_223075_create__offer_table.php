<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics');//->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('offer_price');
            $table->date('start_date');
            $table->date('due_date');
            $table->text('information');
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
        Schema::dropIfExists('_offer');
    }
}
