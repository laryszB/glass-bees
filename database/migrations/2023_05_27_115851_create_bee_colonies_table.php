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
        Schema::create('bee_colonies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('strength', ['bardzo słaba', 'słaba', 'normalna', 'silna', 'bardzo silna']);
            $table->enum('temperament', ['bardzo łagodny', 'łagodny', 'normalny', 'agresywny', 'bardzo agresywny']);
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bee_colonies');
    }
};
