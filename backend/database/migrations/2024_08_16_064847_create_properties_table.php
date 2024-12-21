<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id'); 
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->string('location');
            $table->float('size');
            $table->enum('buildingType', ['Residential', 'Commercial', 'Special Purpose', 'Industrial']);
            $table->enum('propertyType', ['rent', 'sell']);
            $table->decimal('price', 15, 2);
            $table->timestamps();

            $table->foreign('agent_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
