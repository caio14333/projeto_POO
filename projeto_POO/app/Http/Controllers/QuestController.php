<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestRequest;
use App\Models\Quest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quests = Quest::where('is_active', true)->paginate(12);
        $difficulties = ['easy' => 'Fácil', 'normal' => 'Normal', 'hard' => 'Difícil', 'legendary' => 'Lendária'];

        return view('quests.index', compact('quests', 'difficulties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $difficulties = ['easy' => 'Fácil', 'normal' => 'Normal', 'hard' => 'Difícil', 'legendary' => 'Lendária'];

        return view('quests.create', compact('items', 'difficulties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestRequest $request)
    {
        try {
            Quest::create($request->validated());

            return redirect()->route('quests.index')
                ->with('success', 'Quest criada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar quest: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Quest $quest)
    {
        return view('quests.show', compact('quest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quest $quest)
    {
        $items = Item::all();
        $difficulties = ['easy' => 'Fácil', 'normal' => 'Normal', 'hard' => 'Difícil', 'legendary' => 'Lendária'];

        return view('quests.edit', compact('quest', 'items', 'difficulties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestRequest $request, Quest $quest)
    {
        try {
            $quest->update($request->validated());

            return redirect()->route('quests.show', $quest)
                ->with('success', 'Quest atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar quest: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quest $quest)
    {
        try {
            $title = $quest->title;
            $quest->delete();

            return redirect()->route('quests.index')
                ->with('success', "Quest '{$title}' deletada com sucesso!");
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar quest: ' . $e->getMessage());
        }
    }
}
