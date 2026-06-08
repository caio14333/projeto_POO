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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('strength')->default(10);
            $table->integer('dexterity')->default(10);
            $table->integer('constitution')->default(10);
            $table->integer('intelligence')->default(10);
            $table->integer('wisdom')->default(10);
            $table->integer('charisma')->default(10);
            $table->integer('hp')->default(100);
            $table->integer('max_hp')->default(100);
            $table->integer('mp')->default(50);
            $table->integer('max_mp')->default(50);
            $table->integer('level')->default(1);
            $table->integer('experience')->default(0);
            $table->string('class')->default('Warrior');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
