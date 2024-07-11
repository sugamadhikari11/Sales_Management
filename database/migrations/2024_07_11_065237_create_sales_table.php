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
        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->double('quantity');
            $table->double('rate');
            $table->double('amount');
            $table->double('VAT');
            $table->double('total_amount');
            $table->string('remarks');
            $table->double('payment');
            $table->double('MOU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale');
    }
};
