<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class QuestRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:quests,title,' . ($this->quest?->id ?? 'NULL'),
            'description' => 'required|string|min:10',
            'objectives' => 'nullable|string',
            'rewards' => 'nullable|string',
            'recommended_level' => 'required|integer|min:1|max:100',
            'gold_reward' => 'required|integer|min:0|max:100000',
            'experience_reward' => 'required|integer|min:0|max:100000',
            'reward_item_id' => 'nullable|exists:items,id',
            'is_active' => 'required|boolean',
            'is_repeatable' => 'required|boolean',
            'difficulty' => 'required|string|in:easy,normal,hard,legendary',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'O título da quest é obrigatório.',
            'title.unique' => 'Já existe uma quest com este título.',
            'description.required' => 'A descrição é obrigatória.',
            'difficulty.in' => 'Dificuldade inválida.',
            'reward_item_id.exists' => 'Item de recompensa não encontrado.',
        ];
    }
}
