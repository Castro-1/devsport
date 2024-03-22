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
            $table->string('address', 255)->nullable()->default(null);
            $table->string('role')->default('client');
            $table->integer('balance')->default(5000);
            $table->integer('age')->nullable()->default(null);
            $table->integer('weight')->nullable()->default(null);
            $table->integer('height')->nullable()->default(null);
            $table->char('gender')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'role', 'balance', 'age', 'weight', 'height', 'gender']);
        });
    }
};
