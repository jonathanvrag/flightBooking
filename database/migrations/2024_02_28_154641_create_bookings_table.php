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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('document');
            $table->foreignId('reservedChairs')->constrained(
                table: 'chairs',
                indexName: 'cantBooking'
            );
            $table->foreignId('flight_id')->constrained(
                table: 'flights',
                indexName: 'id'
            );
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
        Schema::dropIfExists('bookings');
    }
};
