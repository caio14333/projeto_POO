<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = [
        'title',
        'description',
        'objectives',
        'rewards',
        'recommended_level',
        'gold_reward',
        'experience_reward',
        'reward_item_id',
        'is_active',
        'is_repeatable',
        'difficulty',
    ];

    // Uma quest pertence a muitos personagens (relacionamento many-to-many)
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_quest')
            ->withPivot('status', 'started_at', 'completed_at', 'is_completed')
            ->withTimestamps();
    }

    // Uma quest pode ter um item de recompensa
    public function rewardItem()
    {
        return $this->belongsTo(Item::class, 'reward_item_id');
    }

    // Método para obter o rótulo de dificuldade
    public function getDifficultyLabel()
    {
        $difficulties = [
            'easy' => 'Fácil',
            'normal' => 'Normal',
            'hard' => 'Difícil',
            'legendary' => 'Lendária',
        ];

        return $difficulties[$this->difficulty] ?? 'Desconhecida';
    }

    // Método para obter a cor de dificuldade
    public function getDifficultyColor()
    {
        $colors = [
            'easy' => 'green',
            'normal' => 'blue',
            'hard' => 'orange',
            'legendary' => 'red',
        ];

        return $colors[$this->difficulty] ?? 'gray';
    }

    // Método para verificar se o personagem pode pegar a quest
    public function canCharacterAccept($character)
    {
        return $character->level >= $this->recommended_level && $this->is_active;
    }

    // Método para obter uma quest aleatória
    public static function getRandomQuest()
    {
        return self::where('is_active', true)->inRandomOrder()->first();
    }
}
