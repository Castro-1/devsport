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
        Schema::create('trainingcontexts', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->string('place');
            $table->integer('frequency');
            $table->integer('level');
            $table->json('objectives')->nullable();
            $table->string('specifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainingcontexts');
    }
};