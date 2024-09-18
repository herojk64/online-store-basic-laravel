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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->decimal('total_amount', 8, 2); // Total order amount
            $table->string('status')->default('pending'); // Order status
            $table->string('city');
            $table->string('name');
            $table->string('postcode');
            $table->string('payment_method')->nullable(); // Payment method (optional)
            $table->text('address'); // Shipping address
            $table->timestamp('order_date')->useCurrent(); // Order date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
