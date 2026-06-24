@extends('layouts.app')

@section('title', $character->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <section class="rounded-3xl bg-gradient-to-r from-orange-700 via-amber-600 to-orange-500 p-6 text-white shadow-xl ring-1 ring-black/10">
            <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-semibold">{{ $character->name }}</h1>
                    <div class="mt-4 flex flex-wrap gap-3 text-sm font-semibold">
                        <span class="rounded-full bg-white/15 px-4 py-2">{{ $character->class }}</span>
                        <span class="rounded-full bg-white/15 px-4 py-2">Nível {{ $character->level }}</span>
                        <span class="rounded-full bg-white/15 px-4 py-2">XP: {{ number_format($character->experience) }}</span>
                    </div>
                    <p class="mt-4 text-sm leading-7 text-slate-100"><i class="fas fa-calendar mr-2"></i>Criado em {{ $character->created_at->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('characters.edit', $character) }}" class="inline-flex items-center justify-center rounded-2xl bg-yellow-300 px-5 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-yellow-300/20 hover:bg-yellow-200 transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('characters.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-white/20 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>
        </section>

        <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
            <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                <div class="grid gap-6 lg:grid-cols-2">
                    <div class="rounded-3xl bg-slate-50 p-6">
                        <h2 class="text-xl font-semibold text-slate-900">Vitalidade</h2>
                        <div class="mt-5 space-y-4">
                            <div>
                                <div class="flex items-center justify-between text-sm font-semibold text-slate-600">
                                    <span>Pontos de Vida</span>
                                    <span>{{ $character->hp }}/{{ $character->max_hp }}</span>
                                </div>
                                <div class="mt-2 h-3 overflow-hidden rounded-full bg-slate-200">
                                    <div class="h-3 rounded-full bg-rose-500" style="width: {{ ($character->hp / max($character->max_hp, 1)) * 100 }}%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between text-sm font-semibold text-slate-600">
                                    <span>Pontos de Mana</span>
                                    <span>{{ $character->mp }}/{{ $character->max_mp }}</span>
                                </div>
                                <div class="mt-2 h-3 overflow-hidden rounded-full bg-slate-200">
                                    <div class="h-3 rounded-full bg-sky-500" style="width: {{ ($character->mp / max($character->max_mp, 1)) * 100 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-slate-50 p-6">
                        <h2 class="text-xl font-semibold text-slate-900">Atributos</h2>
                        <div class="mt-5 grid gap-4 sm:grid-cols-2">
                            @foreach(['Força' => $character->strength, 'Destreza' => $character->dexterity, 'Constituição' => $character->constitution, 'Inteligência' => $character->intelligence, 'Sabedoria' => $character->wisdom, 'Carisma' => $character->charisma] as $label => $value)
                                <div class="rounded-3xl bg-white p-4 text-center shadow-sm">
                                    <p class="text-sm text-slate-500">{{ $label }}</p>
                                    <p class="mt-2 text-3xl font-semibold text-slate-900">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if(!empty($bonuses) && array_sum($bonuses) > 0)
                    <div class="mt-6 rounded-3xl bg-slate-50 p-6">
                        <h2 class="text-xl font-semibold text-slate-900">Atributos Com Equipamento</h2>
                        <div class="mt-5 space-y-4 text-sm text-slate-600">
                            @foreach($bonuses as $key => $bonus)
                                <div class="grid grid-cols-[1fr_auto] gap-4 rounded-3xl bg-white p-4 shadow-sm">
                                    <div class="capitalize">{{ $key }}</div>
                                    <div class="font-semibold text-slate-900 {{ $bonus > 0 ? 'text-emerald-700' : ($bonus < 0 ? 'text-rose-600' : '') }}">{{ $bonus > 0 ? '+' : '' }}{{ $bonus }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </section>

            <aside class="space-y-6">
                <div class="rounded-[2rem] bg-[#f7f7ff] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-slate-900">Inventário</h3>
                    <div class="mt-4 space-y-4">
                        @if($items->count() > 0)
                            @foreach($items as $item)
                                <div class="rounded-3xl bg-white p-4 shadow-sm">
                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-slate-900">{{ $item->name }}</p>
                                            <p class="text-sm text-slate-500">{{ $item->type }}</p>
                                        </div>
                                        @if($item->pivot->is_equipped)
                                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Equipado</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-slate-600">Nenhum item equipado no momento.</p>
                        @endif
                    </div>
                </div>

                <div class="rounded-[2rem] bg-[#f8fafc] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-slate-900">Missões</h3>
                    <div class="mt-4 space-y-4">
                        @if($quests->count() > 0)
                            @foreach($quests as $quest)
                                <div class="rounded-3xl bg-white p-4 shadow-sm">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-slate-900">{{ $quest->title }}</p>
                                            <p class="text-sm text-slate-500">{{ $quest->getDifficultyLabel() }}</p>
                                        </div>
                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                            @if($quest->pivot->is_completed)
                                                Completa
                                            @elseif($quest->pivot->status === 'in_progress')
                                                Em Progresso
                                            @else
                                                Disponível
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-sm text-slate-600">Nenhuma missão ativa no momento.</p>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
