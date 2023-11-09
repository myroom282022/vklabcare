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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('package_name')->nullable();
            $table->text('package_description')->nullable();
            $table->text('description_not_add')->nullable();
            $table->decimal('package_price')->default('0');
            $table->decimal('package_discount_price')->default('0');
            $table->string('package_image')->nullable();
            $table->string('package_type')->nullable();
            $table->decimal('package_discount_percentage')->default('0');
            $table->string('package_category_name')->nullable();
            $table->string('package_slug_name')->nullable();
            $table->string('total_test')->nullable();
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
        Schema::dropIfExists('packages');
    }
};
