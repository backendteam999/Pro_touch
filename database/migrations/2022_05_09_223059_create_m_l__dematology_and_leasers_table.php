<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLDematologyAndLeasersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_l__dematology_and_leasers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skin_type');
            $table->String('skin_colour');
            $table->string('skin_allergies');
            $table->String('job');
            $table->unsignedInteger('medical_log_id');
            $table->foreign('medical_log_id')->references('id')->on('medical_logs');
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
        Schema::dropIfExists('m_l__dematology_and_leasers');
    }
}
