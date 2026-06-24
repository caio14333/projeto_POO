@extends('layouts.app')

@section('title', 'Nova Missão - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl bg-[#f7e8ff] p-6 shadow-xl ring-1 ring-black/5">
            <div class="max-w-4xl">
                <h1 class="text-3xl font-semibold text-[#3a2918]"><i class="fas fa-plus-circle text-[#8862c8]"></i> Criar Nova Missão</h1>
                <p class="mt-3 text-sm text-[#6b5a47]">Defina a missão, suas recompensas e o nível recomendado.</p>
            </div>
        </div>

        <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
            <div class="mb-6 border-b border-[#e7d7ba] pb-4">
                <h2 class="text-xl font-semibold text-[#3a2918]">Formulário de Missão</h2>
                <p class="mt-1 text-sm text-[#7a6751]">Preencha os detalhes para criar uma nova quest.</p>
            </div>

            <form action="{{ route('quests.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-[#4a3824]">Título</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                    >
                    @error('title')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4a3824]">Descrição</label>
                    <textarea
                        name="description"
                        rows="4"
                        required
                        class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                    >{{ old('description') }}</textarea>
                    @error('description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4a3824]">Objetivos</label>
                    <textarea
                        name="objectives"
                        rows="3"
                        class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                    >{{ old('objectives') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4a3824]">Recompensas (descrição)</label>
                    <textarea
                        name="rewards"
                        rows="3"
                        class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                    >{{ old('rewards') }}</textarea>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Nível Recomendado</label>
                        <input
                            type="number"
                            name="recommended_level"
                            value="{{ old('recommended_level', 1) }}"
                            min="1"
                            max="100"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Dificuldade</label>
                        <select
                            name="difficulty"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                        >
                            @foreach($difficulties as $key => $label)
                                <option value="{{ $key }}" {{ old('difficulty', 'normal') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Recompensa em Ouro</label>
                        <input
                            type="number"
                            name="gold_reward"
                            value="{{ old('gold_reward', 0) }}"
                            min="0"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Recompensa em XP</label>
                        <input
                            type="number"
                            name="experience_reward"
                            value="{{ old('experience_reward', 0) }}"
                            min="0"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Item de Recompensa</label>
                        <select
                            name="reward_item_id"
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#8862c8] focus:outline-none focus:ring-2 focus:ring-[#8862c8]/30"
                        >
                            <option value="">Nenhum</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}" {{ old('reward_item_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Status</label>
                        <div class="mt-2 space-y-2">
                            <label class="inline-flex items-center gap-2 rounded-2xl bg-[#f7f1e4] px-4 py-3">
                                <input type="hidden" name="is_active" value="0" />
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-[#c8862f] focus:ring-[#c8862f]" />
                                <span class="text-sm text-[#4a3824]">Ativa</span>
                            </label>
                            <label class="inline-flex items-center gap-2 rounded-2xl bg-[#f7f1e4] px-4 py-3">
                                <input type="hidden" name="is_repeatable" value="0" />
                                <input type="checkbox" name="is_repeatable" value="1" {{ old('is_repeatable') ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-[#c8862f] focus:ring-[#c8862f]" />
                                <span class="text-sm text-[#4a3824]">Repetível</span>
                            </label>
                        </div>
                        @error('is_active')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        @error('is_repeatable')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#8862c8] px-5 py-3 text-sm font-semibold text-white shadow-md shadow-[#8862c8]/20 hover:bg-[#9d7be3] transition">
                        <i class="fas fa-save mr-2"></i> Criar Missão
                    </button>
                    <a href="{{ route('quests.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-[#d8c09b] bg-white px-5 py-3 text-sm font-semibold text-[#8b6a3d] shadow-sm hover:bg-[#f7efe2] transition">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </div>
@endsection
