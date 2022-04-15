<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctordetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctordetails', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('address');
            $table->string('specialist');
            $table->string('phone');
            $table->string('Facility1');
            $table->string('Facility2');
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
        Schema::dropIfExists('doctordetails');
    }
}
