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
            $table->string('payment_type')->nullable();
            $table->string('vpa')->nullable();
            $table->string('upi_transaction_id')->nullable();
            $table->text('card_details')->nullable();
            $table->string('currency')->nullable();
            $table->string('description')->nullable();
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
