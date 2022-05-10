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
        Schema::create('_offer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id');
            $table->foreignId('service_id');
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
