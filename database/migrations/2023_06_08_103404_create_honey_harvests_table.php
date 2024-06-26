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
        Schema::create('honey_harvests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apiary_id')->constrained()->onDelete('cascade');
            $table->decimal('weight');
            $table->decimal('volume');
            $table->decimal('price');
            $table->decimal('profit');
            $table->decimal('average_weight_per_beehive');
            $table->date('harvest_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('honey_harvests');
    }
};
