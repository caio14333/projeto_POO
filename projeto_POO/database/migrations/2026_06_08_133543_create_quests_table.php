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
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('objectives')->nullable();
            $table->text('rewards')->nullable();
            $table->integer('recommended_level')->default(1);
            $table->integer('gold_reward')->default(0);
            $table->integer('experience_reward')->default(0);
            $table->foreignId('reward_item_id')->nullable()->constrained('items')->onDelete('set null');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_repeatable')->default(false);
            $table->string('difficulty')->default('normal'); // easy, normal, hard, legendary
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quests');
    }
};
