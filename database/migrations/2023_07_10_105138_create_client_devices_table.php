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
        Schema::create('client_devices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device_id')->nullable();
            $table->string('device_name')->nullable();
            $table->string('device_platform')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_ipaddress')->nullable();
            $table->string('browser_name')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('countryName')->nullable();
            $table->string('regionName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('regionCode')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('isoCode')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('metroCode')->nullable();
            $table->string('areaCode')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('client_devices');
    }
};
