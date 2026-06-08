<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(12);
        $types = ['weapon' => 'Arma', 'armor' => 'Armadura', 'consumable' => 'Consumível'];
        $rarities = [
            1 => 'Comum',
            2 => 'Incomum',
            3 => 'Raro',
            4 => 'Épico',
            5 => 'Lendário'
        ];

        return view('items.index', compact('items', 'types', 'rarities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['weapon' => 'Arma', 'armor' => 'Armadura', 'consumable' => 'Consumível'];
        $rarities = [
            1 => 'Comum (Cinza)',
            2 => 'Incomum (Verde)',
            3 => 'Raro (Azul)',
            4 => 'Épico (Roxo)',
            5 => 'Lendário (Dourado)'
        ];

        return view('items.create', compact('types', 'rarities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        try {
            Item::create($request->validated());

            return redirect()->route('items.index')
                ->with('success', 'Item criado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao criar item: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $types = ['weapon' => 'Arma', 'armor' => 'Armadura', 'consumable' => 'Consumível'];
        $rarities = [
            1 => 'Comum (Cinza)',
            2 => 'Incomum (Verde)',
            3 => 'Raro (Azul)',
            4 => 'Épico (Roxo)',
            5 => 'Lendário (Dourado)'
        ];

        return view('items.edit', compact('item', 'types', 'rarities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        try {
            $item->update($request->validated());

            return redirect()->route('items.show', $item)
                ->with('success', 'Item atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar item: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {
            $name = $item->name;
            $item->delete();

            return redirect()->route('items.index')
                ->with('success', "Item '{$name}' deletado com sucesso!");
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao deletar item: ' . $e->getMessage());
        }
    }
}
