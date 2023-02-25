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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_number')->nullable();
            $table->decimal('total_price')->nullable();
            $table->decimal('product_price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->decimal('delivery_charge')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('payment_type')->nullable();
            $table->enum('status',['Success','Failed','Pending'])->default('Pending');
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
        Schema::dropIfExists('payments');
    }
};
