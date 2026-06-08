<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'strength',
        'dexterity',
        'constitution',
        'intelligence',
        'wisdom',
        'charisma',
        'hp',
        'max_hp',
        'mp',
        'max_mp',
        'level',
        'experience',
        'class',
    ];

    // Um personagem pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um personagem tem muitos itens (relacionamento many-to-many com pivot)
    public function items()
    {
        return $this->belongsToMany(Item::class, 'character_item')
            ->withPivot('quantity', 'is_equipped')
            ->withTimestamps();
    }

    // Um personagem tem muitas quests (relacionamento many-to-many com pivot)
    public function quests()
    {
        return $this->belongsToMany(Quest::class, 'character_quest')
            ->withPivot('status', 'started_at', 'completed_at', 'is_completed')
            ->withTimestamps();
    }

    // Método para calcular bônus totais de atributos baseado nos itens equipados
    public function getEquippedBonuses()
    {
        $equippedItems = $this->items()->wherePivot('is_equipped', true)->get();

        $bonuses = [
            'strength' => 0,
            'dexterity' => 0,
            'constitution' => 0,
            'intelligence' => 0,
            'wisdom' => 0,
            'charisma' => 0,
            'hp' => 0,
            'mp' => 0,
            'damage' => 0,
            'armor_class' => 0,
        ];

        foreach ($equippedItems as $item) {
            $bonuses['strength'] += $item->strength_bonus;
            $bonuses['dexterity'] += $item->dexterity_bonus;
            $bonuses['constitution'] += $item->constitution_bonus;
            $bonuses['intelligence'] += $item->intelligence_bonus;
            $bonuses['wisdom'] += $item->wisdom_bonus;
            $bonuses['charisma'] += $item->charisma_bonus;
            $bonuses['hp'] += $item->hp_bonus;
            $bonuses['mp'] += $item->mp_bonus;
            $bonuses['damage'] += $item->damage;
            $bonuses['armor_class'] += $item->armor_class;
        }

        return $bonuses;
    }

    // Método para calcular stats totais (base + equipado)
    public function getTotalStats()
    {
        $bonuses = $this->getEquippedBonuses();

        return [
            'strength' => $this->strength + $bonuses['strength'],
            'dexterity' => $this->dexterity + $bonuses['dexterity'],
            'constitution' => $this->constitution + $bonuses['constitution'],
            'intelligence' => $this->intelligence + $bonuses['intelligence'],
            'wisdom' => $this->wisdom + $bonuses['wisdom'],
            'charisma' => $this->charisma + $bonuses['charisma'],
            'hp' => min($this->max_hp + $bonuses['hp'], $this->max_hp + $bonuses['hp']),
            'mp' => min($this->max_mp + $bonuses['mp'], $this->max_mp + $bonuses['mp']),
            'damage' => $bonuses['damage'],
            'armor_class' => 10 + $bonuses['armor_class'],
        ];
    }
}
