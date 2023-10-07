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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->timestamp('inspection_date');
            $table->enum('status', ['ok', 'umiarkowane zagrożenie', 'poważne zagrożenie']);
            $table->enum('danger', ['brak matki', 'brak pożywienia', 'choroba', 'pasożyty']);
            $table->longText('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
