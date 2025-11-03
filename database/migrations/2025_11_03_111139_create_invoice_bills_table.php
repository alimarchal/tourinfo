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
        Schema::create('invoice_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'invoice_user_id');
            $table->foreignId('trip_id')->constrained(table: 'trips', indexName: 'invoice_trip_id');
            $table->text('details')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('transaction_particulars')->nullable();
            $table->timestamp('transaction_date')->nullable();
            $table->string('status')->default('pending');
            $table->text('payload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_bills');
    }
};
