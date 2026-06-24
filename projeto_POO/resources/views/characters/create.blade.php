@extends('layouts.app')

@section('title', 'Novo Personagem - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl bg-[#fdf3e6] p-6 shadow-xl ring-1 ring-black/5">
            <div class="max-w-4xl">
                <h1 class="text-3xl font-semibold text-[#3a2918]">
                    <i class="fas fa-user-circle text-[#c8862f]"></i> Criar Novo Personagem
                </h1>
                <p class="mt-3 text-sm text-[#6b5a47]">Escolha seus atributos e classe com cuidado, eles definem seu destino!</p>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
            <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
                <div class="mb-6 border-b border-[#e7d7ba] pb-4">
                    <h2 class="text-xl font-semibold text-[#3a2918]">Gerador de Personagem</h2>
                    <p class="mt-1 text-sm text-[#7a6751]">Preencha os detalhes abaixo para criar sua nova aventura.</p>
                </div>

                <form action="{{ route('characters.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-[#4a3824]">
                                <i class="fas fa-scroll text-[#c8862f]"></i> Nome do Personagem
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
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
                                    <option value="{{ $cls }}" {{ old('class') === $cls ? 'selected' : '' }}>{{ $cls }}</option>
                                @endforeach
                            </select>
                            @error('class')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                            <p class="mt-3 text-sm leading-6 text-[#6b5a47]">
                                <strong>Dicas de Classes:</strong><br>
                                • <strong>Warrior</strong>: Alto STR, bom DEX - Especialista em combate corpo a corpo<br>
                                • <strong>Mage</strong>: Alto INT, bom WIS - Domina magia e feitiços<br>
                                • <strong>Rogue</strong>: Alto DEX, bom CHA - Rápido e furtivo<br>
                                • <strong>Paladin</strong>: Alto STR e WIS - Guerreiro sagrado<br>
                                • <strong>Ranger</strong>: Alto DEX e WIS - Caçador experiente<br>
                                • <strong>Barbarian</strong>: Alto STR, baixa INT - Guerreiro selvagem
                            </p>
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
                                value="{{ old('strength', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Ataque físico e dano melhorado (1-20)</p>
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
                                value="{{ old('dexterity', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Defesa e esquiva (1-20)</p>
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
                                value="{{ old('constitution', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Pontos de Vida (HP) (1-20)</p>
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
                                value="{{ old('intelligence', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Pontos de Mana (MP) (1-20)</p>
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
                                value="{{ old('wisdom', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Percepção e resistência mental (1-20)</p>
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
                                value="{{ old('charisma', 10) }}"
                                min="1"
                                max="20"
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                                required
                            >
                            <p class="mt-2 text-xs text-[#7a6751]">Persuasão e liderança (1-20)</p>
                            @error('charisma')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label for="level" class="block text-sm font-semibold text-[#4a3824]">
                            <i class="fas fa-trophy text-[#b37a25]"></i> Nível Inicial
                        </label>
                        <input
                            type="number"
                            id="level"
                            name="level"
                            value="{{ old('level', 1) }}"
                            min="1"
                            max="100"
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#c8862f] focus:outline-none focus:ring-2 focus:ring-[#c8862f]/30"
                            required
                        >
                        @error('level')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex flex-wrap gap-3 pt-2">
                        <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#c8862f] px-5 py-3 text-sm font-semibold text-[#1a120c] shadow-md shadow-[#c8862f]/20 hover:bg-[#e0a04a] transition">
                            <i class="fas fa-check-circle mr-2"></i> Criar Personagem
                        </button>
                        <a href="{{ route('characters.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-[#d8c09b] bg-white px-5 py-3 text-sm font-semibold text-[#8b6a3d] shadow-sm hover:bg-[#f7efe2] transition">
                            <i class="fas fa-times-circle mr-2"></i> Cancelar
                        </a>
                    </div>
                </form>
            </section>

            <aside class="space-y-6">
                <div class="rounded-[2rem] bg-[#fff7e0] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-info-circle text-[#2b6a8b]"></i> Dica de Atributos</h3>
                    <p class="mt-4 text-sm leading-6 text-[#6b5a47]"><strong>Total de Pontos por Atributo:</strong> 10</p>
                    <p class="mt-2 text-sm leading-6 text-[#6b5a47]">Distribua 6 atributos com valores entre 1 e 20 para criar seu personagem único!</p>
                </div>

                <div class="rounded-[2rem] bg-[#ecf9f1] p-6 shadow-xl ring-1 ring-black/5">
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-heart text-[#2f7b4c]"></i> Cálculo de HP/MP</h3>
                    <div class="mt-4 space-y-2 text-sm leading-6 text-[#6b5a47]">
                        <p><strong>HP:</strong> Base: 100 + (CON × 5)</p>
                        <p>Exemplo: CON=15 → 100 + 75 = 175 HP</p>
                        <p class="mt-3"><strong>MP:</strong> Base: 50 + (INT × 3)</p>
                        <p>Exemplo: INT=15 → 50 + 45 = 95 MP</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
