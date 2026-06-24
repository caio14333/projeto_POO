@extends('layouts.app')

@section('title', $quest->title . ' - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <section class="rounded-3xl bg-gradient-to-r from-sky-600 to-blue-700 p-6 text-white shadow-xl ring-1 ring-black/10">
            <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                <div class="max-w-3xl">
                    <h1 class="text-3xl font-semibold">{{ $quest->title }}</h1>
                    <div class="mt-4 flex flex-wrap gap-3 text-sm font-semibold">
                        <span class="rounded-full bg-white/15 px-4 py-2 text-white">
                            {{ $quest->getDifficultyLabel() }}
                        </span>
                        <span class="rounded-full bg-white/15 px-4 py-2 text-white">Nível {{ $quest->recommended_level }}+</span>
                        @if($quest->is_repeatable)
                            <span class="rounded-full bg-white/15 px-4 py-2 text-white">Repetível</span>
                        @endif
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('quests.edit', $quest) }}" class="inline-flex items-center justify-center rounded-2xl bg-yellow-400 px-5 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-yellow-400/20 hover:bg-yellow-300 transition">
                        <i class="fas fa-edit mr-2"></i> Editar
                    </a>
                    <a href="{{ route('quests.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-white/20 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </div>

            <p class="mt-6 max-w-3xl text-sm leading-7 text-slate-100">{{ $quest->description }}</p>
        </section>

        <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
            <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                <div class="space-y-6">
                    <div class="rounded-3xl bg-slate-50 p-5">
                        <h2 class="text-xl font-semibold text-slate-900">Recompensas</h2>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl bg-[#eff6ff] p-5">
                                <p class="text-sm text-slate-500">Ouro</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($quest->gold_reward) }}</p>
                            </div>
                            <div class="rounded-3xl bg-[#fff7ed] p-5">
                                <p class="text-sm text-slate-500">Experiência</p>
                                <p class="mt-2 text-2xl font-semibold text-slate-900">{{ number_format($quest->experience_reward) }}</p>
                            </div>
                        </div>
                        @if($quest->rewardItem)
                            <div class="mt-4 rounded-3xl bg-[#f8fafc] p-4">
                                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Item de Recompensa</p>
                                <a href="{{ route('items.show', $quest->rewardItem) }}" class="mt-2 inline-flex items-center gap-2 rounded-full bg-sky-100 px-4 py-2 text-sm font-semibold text-sky-700 hover:bg-sky-200 transition">
                                    <i class="fas fa-gift"></i>{{ $quest->rewardItem->name }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="rounded-3xl bg-slate-50 p-5">
                        <h2 class="text-xl font-semibold text-slate-900">Detalhes da Missão</h2>
                        <div class="mt-4 space-y-4 text-sm leading-7 text-slate-600">
                            @if($quest->objectives)
                                <div>
                                    <h3 class="font-semibold text-slate-800">Objetivos</h3>
                                    <p>{{ $quest->objectives }}</p>
                                </div>
                            @endif
                            @if($quest->rewards)
                                <div>
                                    <h3 class="font-semibold text-slate-800">Descrição das Recompensas</h3>
                                    <p>{{ $quest->rewards }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="mt-6 border-t border-slate-200 pt-4 text-sm text-slate-500">
                            <p>Criada em {{ $quest->created_at->format('d/m/Y H:i') }}</p>
                            <p class="mt-1">Atualizada em {{ $quest->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[2rem] bg-[#f7f7ff] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-slate-900">Resumo Rápido</h3>
                    <div class="mt-4 space-y-3 text-sm text-slate-600">
                        <div class="rounded-3xl bg-white p-4 shadow-sm">
                            <p class="text-slate-500">Nível Recomendado</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">{{ $quest->recommended_level }}+</p>
                        </div>
                        <div class="rounded-3xl bg-white p-4 shadow-sm">
                            <p class="text-slate-500">Status</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">{{ $quest->is_active ? 'Ativa' : 'Inativa' }}</p>
                        </div>
                        <div class="rounded-3xl bg-white p-4 shadow-sm">
                            <p class="text-slate-500">Última Atualização</p>
                            <p class="mt-2 text-lg font-semibold text-slate-900">{{ $quest->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-slate-900">Atenção</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">Use o botão "Editar" para ajustar recompensas, alterar objetivos ou marcar esta quest como repetível.</p>
                </div>

                <form action="{{ route('quests.destroy', $quest) }}" method="POST" class="rounded-[2rem] bg-[#fee2e2] p-6 shadow-xl ring-1 ring-black/5">
                    @csrf
                    @method('DELETE')
                    <p class="text-sm font-semibold text-slate-900">Excluir Quest</p>
                    <p class="mt-3 text-sm text-slate-600">Esta ação não pode ser desfeita.</p>
                    <button type="submit" class="mt-5 w-full rounded-2xl bg-red-500 px-4 py-3 text-sm font-semibold text-white shadow-md shadow-red-500/20 hover:bg-red-600 transition">
                        <i class="fas fa-trash mr-2"></i> Deletar Missão
                    </button>
                </form>
            </aside>
        </div>
    </div>
@endsection
