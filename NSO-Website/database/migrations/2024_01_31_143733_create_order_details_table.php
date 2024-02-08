<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('type');
            $table->text('design_text');
            $table->string('design_img')->nullable();
            $table->string('size');
            $table->integer('quantity');
            $table->float('price')->nullable();
            $table->string('mode_of_payment');
            $table->date('order_date');
            $table->date('recieved_date')->nullable();
            $table->string('status')->default('Order Placed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
