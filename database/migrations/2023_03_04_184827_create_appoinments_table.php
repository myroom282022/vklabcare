<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('speciality')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('available_date')->nullable();
            $table->string('available_time')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_phone_number')->nullable();
            $table->text('patient_problem')->nullable();
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
        Schema::dropIfExists('appoinments');
    }
};



