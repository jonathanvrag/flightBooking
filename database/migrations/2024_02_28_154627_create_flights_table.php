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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chairsAvailable')->constrained(
                table: 'chairs',
                indexName: 'cantBooking'
            );
            $table->string('from');
            $table->string('to');
            $table->string('status');
            $table->string('departureDate');
            $table->string('arrivalDate');
            $table->foreignId('plane_id')->constrained(
                table: 'planes',
                indexName: 'id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
