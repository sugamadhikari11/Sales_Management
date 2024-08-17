<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('PAN_VAT');
            $table->string('address');
            $table->string('product_name'); 
            $table->integer('quantity');
            $table->string('payment');
            $table->decimal('VAT', 8, 2);
            $table->string('MOU'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}