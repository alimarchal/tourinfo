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
        Schema::create('trips', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('trip_name')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_contact')->nullable();
            $table->date('check_in_date')->nullable();
            $table->date('booking_date')->nullable();
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->decimal('total_expenses', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->string('agent_name')->nullable();
            $table->enum('booking_status', ['Pending', 'Booked'])->nullable();
            $table->string('path_attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
