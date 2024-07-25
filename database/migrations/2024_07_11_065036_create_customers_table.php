<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('PAN_VAT');
            $table->string('address');
            $table->unsignedBigInteger('product_purchased');
            $table->integer('quantity');
            $table->string('payment');  // Change this to string
            $table->decimal('VAT', 8, 2);
            $table->timestamps();
            
            $table->foreign('product_purchased')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
