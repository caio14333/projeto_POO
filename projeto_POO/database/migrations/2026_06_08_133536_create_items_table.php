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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // weapon, armor, consumable
            $table->text('description')->nullable();
            $table->integer('strength_bonus')->default(0);
            $table->integer('dexterity_bonus')->default(0);
            $table->integer('constitution_bonus')->default(0);
            $table->integer('intelligence_bonus')->default(0);
            $table->integer('wisdom_bonus')->default(0);
            $table->integer('charisma_bonus')->default(0);
            $table->integer('hp_bonus')->default(0);
            $table->integer('mp_bonus')->default(0);
            $table->integer('damage')->default(0);
            $table->integer('armor_class')->default(0);
            $table->integer('price')->default(0);
            $table->integer('rarity')->default(1); // 1=common, 2=uncommon, 3=rare, 4=epic, 5=legendary
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
