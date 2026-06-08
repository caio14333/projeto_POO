<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Auth::user()->characters()->paginate(10);
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ['Warrior', 'Mage', 'Rogue', 'Paladin', 'Ranger', 'Barbarian'];
        return view('characters.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        // Calcular HP e MP baseado na constituição e inteligência
        $constitution = $request->constitution;
        $intelligence = $request->intelligence;

        $max_hp = 100 + ($constitution * 5);
        $max_mp = 50 + ($intelligence * 3);

        try {
            $character = Auth::user()->characters()->create([
                'name' => $request->name,
                'class' => $request->class,
                'strength' => $request->strength,
                'dexterity' => $request->dexterity,
                'constitution' => $request->constitution,
                'intelligence' => $request->intelligence,
                'wisdom' => $request->wisdom,
                'charisma' => $request->charisma,
                'hp' => $max_hp,
                'max_hp' => $max_hp,
                'mp' => $max_mp,
                'max_mp' => $max_mp,
                'level' => $request->level ?? 1,
                'experience' => 0,
            ]);

            return redirect()->route('characters.show', $character)
                ->with('success', 'Personagem criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar personagem: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        // Verificar se o personagem pertence ao usuário autenticado
        if ($character->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para ver este personagem.');
        }

        $totalStats = $character->getTotalStats();
        $bonuses = $character->getEquippedBonuses();
        $items = $character->items()->paginate(10);
        $quests = $character->quests()->paginate(10);

        return view('characters.show', compact('character', 'totalStats', 'bonuses', 'items', 'quests'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        // Verificar se o personagem pertence ao usuário autenticado
        if ($character->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este personagem.');
        }

        $classes = ['Warrior', 'Mage', 'Rogue', 'Paladin', 'Ranger', 'Barbarian'];
        return view('characters.edit', compact('character', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CharacterRequest $request, Character $character)
    {
        // Verificar se o personagem pertence ao usuário autenticado
        if ($character->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar este personagem.');
        }

        try {
            // Recalcular HP e MP se houver mudança em constituição ou inteligência
            $constitution = $request->constitution;
            $intelligence = $request->intelligence;

            $max_hp = 100 + ($constitution * 5);
            $max_mp = 50 + ($intelligence * 3);

            $character->update([
                'name' => $request->name,
                'class' => $request->class,
                'strength' => $request->strength,
                'dexterity' => $request->dexterity,
                'constitution' => $request->constitution,
                'intelligence' => $request->intelligence,
                'wisdom' => $request->wisdom,
                'charisma' => $request->charisma,
                'max_hp' => $max_hp,
                'max_mp' => $max_mp,
                'level' => $request->level,
            ]);

            return redirect()->route('characters.show', $character)
                ->with('success', 'Personagem atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar personagem: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        // Verificar se o personagem pertence ao usuário autenticado
        if ($character->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para deletar este personagem.');
        }

        try {
            $name = $character->name;
            $character->delete();

            return redirect()->route('characters.index')
                ->with('success', "Personagem '{$name}' deletado com sucesso!");
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar personagem: ' . $e->getMessage());
        }
    }
}
