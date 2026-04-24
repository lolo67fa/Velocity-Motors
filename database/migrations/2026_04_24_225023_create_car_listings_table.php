<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car_listings', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('brand');
            $table->string('year');
            $table->integer('price');
            $table->string('color');
            $table->string('mileage');
            $table->string('seller_name');
            $table->string('seller_phone');
            $table->string('seller_email');
            $table->string('location');
            $table->string('status')->default('Available');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_listings');
    }
};