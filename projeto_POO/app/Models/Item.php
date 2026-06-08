<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'strength_bonus',
        'dexterity_bonus',
        'constitution_bonus',
        'intelligence_bonus',
        'wisdom_bonus',
        'charisma_bonus',
        'hp_bonus',
        'mp_bonus',
        'damage',
        'armor_class',
        'price',
        'rarity',
    ];

    // Um item pertence a muitos personagens (relacionamento many-to-many)
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_item')
            ->withPivot('quantity', 'is_equipped')
            ->withTimestamps();
    }

    // Um item pode ser a recompensa de muitas quests
    public function quests()
    {
        return $this->hasMany(Quest::class, 'reward_item_id');
    }

    // Método para obter o rótulo de raridade
    public function getRarityLabel()
    {
        $rarities = [
            1 => 'Common',
            2 => 'Uncommon',
            3 => 'Rare',
            4 => 'Epic',
            5 => 'Legendary',
        ];

        return $rarities[$this->rarity] ?? 'Unknown';
    }

    // Método para obter a cor de raridade
    public function getRarityColor()
    {
        $colors = [
            1 => 'gray',
            2 => 'green',
            3 => 'blue',
            4 => 'purple',
            5 => 'gold',
        ];

        return $colors[$this->rarity] ?? 'gray';
    }
}
