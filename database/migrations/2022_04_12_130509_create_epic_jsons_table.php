<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpicJsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epic_jsons', function (Blueprint $table) {
            $table->id();
            $table->string('fullUrl');
            $table->string('resourcetype');
            $table->string('reference_id');
            $table->string('active');
            $table->string('FullName');
            $table->string('LastName');
            $table->string('FirstName');
            $table->string('gender');
            $table->string('communication'); 
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
        Schema::dropIfExists('epic_jsons');
    }
}
