@extends('layouts.app')

@section('title', $item->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <section class="rounded-3xl bg-gradient-to-r from-amber-700 via-orange-600 to-rose-500 p-6 text-white shadow-xl ring-1 ring-black/10">
            <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-semibold">{{ $item->name }}</h1>
                    <div class="mt-4 flex flex-wrap gap-3 text-sm font-semibold">
                        <span class="rounded-full bg-white/15 px-4 py-2 text-white">{{ $item->getRarityLabel() }}</span>
                        <span class="rounded-full bg-white/15 px-4 py-2 text-white">{{ $item->type }}</span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('items.edit', $item) }}" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-5 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('items.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-white/20 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>

            <p class="mt-6 max-w-3xl text-sm leading-7 text-slate-100">{{ $item->description }}</p>
        </section>

        <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
            <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                <div class="space-y-6">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <h2 class="text-xl font-semibold text-slate-900">Atributos</h2>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            @foreach(['Força' => $item->strength_bonus, 'Destreza' => $item->dexterity_bonus, 'Constituição' => $item->constitution_bonus, 'Inteligência' => $item->intelligence_bonus, 'Sabedoria' => $item->wisdom_bonus, 'Carisma' => $item->charisma_bonus] as $label => $value)
                                <div class="rounded-3xl bg-[#f8fafc] p-4">
                                    <p class="text-sm text-slate-500">{{ $label }}</p>
                                    <p class="mt-2 text-2xl font-semibold text-slate-900 {{ $value > 0 ? 'text-emerald-700' : ($value < 0 ? 'text-rose-600' : 'text-slate-900') }}">{{ $value > 0 ? '+' : '' }}{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-3xl bg-slate-50 p-5">
                        <h2 class="text-xl font-semibold text-slate-900">Especiais</h2>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl bg-[#eff6ff] p-4">
                                <p class="text-sm text-slate-500">Bônus de HP</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900 {{ $item->hp_bonus > 0 ? 'text-emerald-700' : 'text-slate-900' }}">{{ $item->hp_bonus > 0 ? '+' : '' }}{{ $item->hp_bonus }}</p>
                            </div>
                            <div class="rounded-3xl bg-[#eef2ff] p-4">
                                <p class="text-sm text-slate-500">Bônus de MP</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900 {{ $item->mp_bonus > 0 ? 'text-emerald-700' : 'text-slate-900' }}">{{ $item->mp_bonus > 0 ? '+' : '' }}{{ $item->mp_bonus }}</p>
                            </div>
                            <div class="rounded-3xl bg-[#fff1f2] p-4">
                                <p class="text-sm text-slate-500">Dano</p>
                                <p class="mt-2 text-2xl font-semibold text-rose-600">{{ $item->damage }}</p>
                            </div>
                            <div class="rounded-3xl bg-[#fff7ed] p-4">
                                <p class="text-sm text-slate-500">Classe de Armadura</p>
                                <p class="mt-2 text-2xl font-semibold text-amber-700">{{ $item->armor_class }}</p>
                            </div>
                        </div>
                        <div class="mt-6 rounded-3xl bg-slate-100 p-4">
                            <p class="text-sm text-slate-500">Preço</p>
                            <p class="mt-2 text-2xl font-semibold text-slate-900"><i class="fas fa-coins"></i> {{ number_format($item->price) }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[2rem] bg-[#f8fafc] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-slate-900">Resumo</h3>
                    <div class="mt-4 space-y-3 text-sm leading-6 text-slate-600">
                        <p><strong>Tipo:</strong> {{ $item->type }}</p>
                        <p><strong>Raridade:</strong> {{ $item->getRarityLabel() }}</p>
                        <p><strong>Descrição:</strong> {{ $item->description }}</p>
                    </div>
                </div>

                <form action="{{ route('items.destroy', $item) }}" method="POST" class="rounded-[2rem] bg-[#fee2e2] p-6 shadow-xl ring-1 ring-black/5">
                    @csrf
                    @method('DELETE')
                    <p class="text-sm font-semibold text-slate-900">Excluir Item</p>
                    <p class="mt-3 text-sm text-slate-600">Esta ação fará com que o item deixe de existir no inventário.</p>
                    <button type="submit" class="mt-5 w-full rounded-2xl bg-red-500 px-4 py-3 text-sm font-semibold text-white shadow-md shadow-red-500/20 hover:bg-red-600 transition">
                        <i class="fas fa-trash mr-2"></i> Deletar Item
                    </button>
                </form>
            </aside>
        </div>
    </div>
@endsection
