<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:characters,name,' . ($this->character?->id ?? 'NULL'),
            'class' => 'required|string|in:Warrior,Mage,Rogue,Paladin,Ranger,Barbarian',
            'strength' => 'required|integer|between:1,20',
            'dexterity' => 'required|integer|between:1,20',
            'constitution' => 'required|integer|between:1,20',
            'intelligence' => 'required|integer|between:1,20',
            'wisdom' => 'required|integer|between:1,20',
            'charisma' => 'required|integer|between:1,20',
            'level' => 'required|integer|between:1,100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do personagem é obrigatório.',
            'name.string' => 'O nome deve ser um texto válido.',
            'name.max' => 'O nome não pode exceder 100 caracteres.',
            'name.unique' => 'Já existe um personagem com este nome.',
            'class.required' => 'A classe do personagem é obrigatória.',
            'class.in' => 'A classe selecionada não é válida.',
            'strength.required' => 'A força é obrigatória.',
            'strength.between' => 'A força deve estar entre 1 e 20.',
            'dexterity.required' => 'A destreza é obrigatória.',
            'dexterity.between' => 'A destreza deve estar entre 1 e 20.',
            'constitution.required' => 'A constituição é obrigatória.',
            'constitution.between' => 'A constituição deve estar entre 1 e 20.',
            'intelligence.required' => 'A inteligência é obrigatória.',
            'intelligence.between' => 'A inteligência deve estar entre 1 e 20.',
            'wisdom.required' => 'A sabedoria é obrigatória.',
            'wisdom.between' => 'A sabedoria deve estar entre 1 e 20.',
            'charisma.required' => 'O carisma é obrigatório.',
            'charisma.between' => 'O carisma deve estar entre 1 e 20.',
            'level.required' => 'O nível é obrigatório.',
            'level.between' => 'O nível deve estar entre 1 e 100.',
        ];
    }
}
