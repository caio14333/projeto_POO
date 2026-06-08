<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:items,name,' . ($this->item?->id ?? 'NULL'),
            'type' => 'required|string|in:weapon,armor,consumable',
            'description' => 'nullable|string',
            'strength_bonus' => 'required|integer|min:-10|max:10',
            'dexterity_bonus' => 'required|integer|min:-10|max:10',
            'constitution_bonus' => 'required|integer|min:-10|max:10',
            'intelligence_bonus' => 'required|integer|min:-10|max:10',
            'wisdom_bonus' => 'required|integer|min:-10|max:10',
            'charisma_bonus' => 'required|integer|min:-10|max:10',
            'hp_bonus' => 'required|integer|min:-50|max:100',
            'mp_bonus' => 'required|integer|min:-50|max:100',
            'damage' => 'required|integer|min:0|max:50',
            'armor_class' => 'required|integer|min:0|max:20',
            'price' => 'required|integer|min:0|max:1000000',
            'rarity' => 'required|integer|in:1,2,3,4,5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome do item é obrigatório.',
            'type.required' => 'O tipo do item é obrigatório.',
            'type.in' => 'Tipo de item inválido.',
            'price.required' => 'O preço é obrigatório.',
            'rarity.in' => 'Raridade inválida.',
        ];
    }
}
