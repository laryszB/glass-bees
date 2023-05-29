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
        Schema::create('beehive_beehive_accessories', function (Blueprint $table) {
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->foreignId('beehive_accessory_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beehive_beehive_accessories');
    }
};
