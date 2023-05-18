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
        Schema::create('beehives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apiary_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->longText('description');
            $table->string('type');
            $table->integer('bodies')->unsigned();
            $table->string('bottoms');
            $table->integer('extensions')->unsigned();
            $table->integer('half_extensions')->unsigned();
            $table->integer('frames')->unsigned();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beehives');
    }
};
