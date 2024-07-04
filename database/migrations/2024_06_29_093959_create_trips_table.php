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
            $table->string('trip_name');
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_contact');
            $table->date('check_in_date');
            $table->date('booking_date');
            $table->decimal('total_cost', 10, 2);
            $table->decimal('total_expenses', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->string('agent_name');
            $table->enum('booking_status', ['Pending', 'Booked']);
            $table->string('attachment_path');
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
