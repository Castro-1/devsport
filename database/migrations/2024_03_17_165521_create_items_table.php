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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // TODO: Uncomment this once the orders table is created
            // $table->foreignId('order_id')->constrained()->onDelete('cascade'); // foreign key to orders table, delete item when order is deleted
            $table->unsignedBigInteger('order_id');
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};