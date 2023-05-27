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
        Schema::create('diseases_cases', function (Blueprint $table) {
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->foreignId('bee_disease_id')->constrained()->onDelete('cascade');
            $table->dateTime('date');
            $table->longText('note');
            $table->enum('status', ['nieleczona', 'w trakcie leczenia', 'uleczona']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diseases_cases');
    }
};
