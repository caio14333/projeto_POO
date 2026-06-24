@extends('layouts.app')

@section('title', 'Editar ' . $character->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl bg-[#fff7e0] p-6 shadow-xl ring-1 ring-black/5">
            <div class="max-w-4xl">
                <h1 class="text-3xl font-semibold text-[#3a2918]">
                    <i class="fas fa-edit text-[#c8862f]"></i> Editar Personagem: {{ $character->name }}
                </h1>
                <p class="mt-3 text-sm text-[#6b5a47]">Ajuste os atributos e informações do seu herói.</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
            <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                <div class="mb-6 border-b border-[#e7d7ba] pb-4">
                    <h2 class="text-xl font-semibold text-[#3a2918]">Editar Informações</h2>
                    <p class="mt-1 text-sm text-[#7a6751]">Faça alterações no seu personagem e salve as atualizações.</p>
                </div>

                <form action="{{ route('characters.update', $character) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-scroll text-[#c8862f]"></i> Nome do Personagem
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $character->name) }}"
                                placeholder="Ex: Aragorn, Merlin, Legolas"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="class" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-user-tag text-[#8d6b32]"></i> Classe
                            </label>
                            <select
                                id="class"
                                name="class"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                            >
                                <option value="">Selecione uma classe...</option>
                                @foreach($classes as $cls)
                                    <option value="{{ $cls }}" {{ old('class', $character->class) === $cls ? 'selected' : '' }}>{{ $cls }}</option>
                                @endforeach
                            </select>
                            @error('class')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label for="strength" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-fist-raised text-[#c03f3f]"></i> Força (STR)
                            </label>
                            <input
                                type="number"
                                id="strength"
                                name="strength"
                                value="{{ old('strength', $character->strength) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('strength')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="dexterity" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-running text-[#2f8f56]"></i> Destreza (DEX)
                            </label>
                            <input
                                type="number"
                                id="dexterity"
                                name="dexterity"
                                value="{{ old('dexterity', $character->dexterity) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('dexterity')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="constitution" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-shield-alt text-[#d08a2f]"></i> Constituição (CON)
                            </label>
                            <input
                                type="number"
                                id="constitution"
                                name="constitution"
                                value="{{ old('constitution', $character->constitution) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('constitution')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="intelligence" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-brain text-[#3b82f6]"></i> Inteligência (INT)
                            </label>
                            <input
                                type="number"
                                id="intelligence"
                                name="intelligence"
                                value="{{ old('intelligence', $character->intelligence) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('intelligence')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="wisdom" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-lightbulb text-[#d6a50b]"></i> Sabedoria (WIS)
                            </label>
                            <input
                                type="number"
                                id="wisdom"
                                name="wisdom"
                                value="{{ old('wisdom', $character->wisdom) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('wisdom')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="charisma" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-star text-[#3d8c5d]"></i> Carisma (CHA)
                            </label>
                            <input
                                type="number"
                                id="charisma"
                                name="charisma"
                                value="{{ old('charisma', $character->charisma) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            @error('charisma')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-semibold text-[#4a3824]">
                            <i class="fas fa-trophy text-[#b37a25]"></i> Nível
                        </label>
                        <input
                            type="number"
                            id="level"
                            name="level"
                            value="{{ old('level', $character->level) }}"
                            min="1"
                            max="100"
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                            required
                        >
                        @error('level')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex flex-wrap gap-3 pt-2">
                        <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#d6a14f] px-5 py-3 text-sm font-semibold text-[#1a120c] shadow-md shadow-[#d6a14f]/20 hover:bg-[#e9c16b] transition">
                            <i class="fas fa-save mr-2"></i> Salvar Alterações
                        </button>
                        <a href="{{ route('characters.show', $character) }}" class="inline-flex items-center justify-center rounded-2xl border border-[#d8c09b] bg-white px-5 py-3 text-sm font-semibold text-[#8b6a3d] shadow-sm hover:bg-[#f7efe2] transition">
                            <i class="fas fa-times-circle mr-2"></i> Cancelar
                        </a>
                    </div>
                </form>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[2rem] bg-[#fff7e0] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-user-circle text-[#c8862f]"></i> Status Atual</h3>
                    <ul class="mt-4 space-y-2 text-sm text-[#6b5a47]">
                        <li><strong>Nome:</strong> {{ $character->name }}</li>
                        <li><strong>Classe:</strong> {{ $character->class }}</li>
                        <li><strong>Nível:</strong> {{ $character->level }}</li>
                        <li><strong>Experiência:</strong> {{ number_format($character->experience) }}</li>
                        <li><strong>HP:</strong> {{ $character->hp }}/{{ $character->max_hp }}</li>
                        <li><strong>MP:</strong> {{ $character->mp }}/{{ $character->max_mp }}</li>
                        <li><strong>Criado em:</strong> {{ $character->created_at->format('d/m/Y H:i') }}</li>
                        <li><strong>Última atualização:</strong> {{ $character->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>
                </div>

                <div class="rounded-[2rem] bg-[#ecf9f1] p-6 shadow-xl ring-1 ring-black/5">
                    <p class="text-sm text-[#6b5a47]"><strong>Dica:</strong> Alterar Constituição e Inteligência recalculará HP e MP automaticamente!</p>
                </div>
            </aside>
        </div>
    </div>
@endsection
