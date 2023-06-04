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
        Schema::create('mother_bees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beehive_id')->constrained()->onDelete('cascade');
            $table->string('race');
            $table->string('line');
            $table->date('placement_date');
            $table->date('birth_date');
            $table->enum('state', ['unasieniona', 'nieunasieniona', 'trutniowa']);
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_bees');
    }
};
