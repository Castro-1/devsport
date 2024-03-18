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
        Schema::table('users', function (Blueprint $table) {
            // $table->char('gender')->default(null);
            // $table->string('address',255)->default(null);
            $table->string('role')->default('client');
            $table->integer('balance')->default(5000);
            // $table->integer('age')->default(null);
            // $table->integer('weigth')->default(null);
            // $table->integer('height')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'balance']);
        });
    }
};
