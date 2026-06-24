@extends('layouts.app')

@section('title', 'Editar ' . $item->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl bg-[#eef7ff] p-6 shadow-xl ring-1 ring-black/5">
            <div class="max-w-4xl">
                <h1 class="text-3xl font-semibold text-[#3a2918]"><i class="fas fa-edit text-[#2f6fb8]"></i> Editar Item: {{ $item->name }}</h1>
                <p class="mt-3 text-sm text-[#6b5a47]">Atualize o item para ajustar atributos, preço ou raridade.</p>
            </div>
        </div>

        <section class="rounded-[2rem] bg-white p-6 shadow-xl ring-1 ring-black/5">
            <div class="mb-6 border-b border-[#e7d7ba] pb-4">
                <h2 class="text-xl font-semibold text-[#3a2918]">Editar Informações</h2>
                <p class="mt-1 text-sm text-[#7a6751]">Altere os dados do item e salve as modificações.</p>
            </div>

            <form action="{{ route('items.update', $item) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Nome</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $item->name) }}"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                        >
                        @error('name')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#4a3824]">Tipo</label>
                        <select
                            name="type"
                            required
                            class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                        >
                            @foreach($types as $key => $label)
                                <option value="{{ $key }}" {{ old('type', $item->type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#4a3824]">Descrição</label>
                    <textarea
                        name="description"
                        rows="3"
                        class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                    >{{ old('description', $item->description) }}</textarea>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-star text-[#c8862f]"></i> Modificadores de Atributos</h3>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Força</label>
                            <input
                                type="number"
                                name="strength_bonus"
                                value="{{ old('strength_bonus', $item->strength_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Destreza</label>
                            <input
                                type="number"
                                name="dexterity_bonus"
                                value="{{ old('dexterity_bonus', $item->dexterity_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Constituição</label>
                            <input
                                type="number"
                                name="constitution_bonus"
                                value="{{ old('constitution_bonus', $item->constitution_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Inteligência</label>
                            <input
                                type="number"
                                name="intelligence_bonus"
                                value="{{ old('intelligence_bonus', $item->intelligence_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Sabedoria</label>
                            <input
                                type="number"
                                name="wisdom_bonus"
                                value="{{ old('wisdom_bonus', $item->wisdom_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Carisma</label>
                            <input
                                type="number"
                                name="charisma_bonus"
                                value="{{ old('charisma_bonus', $item->charisma_bonus) }}"
                                min="-10"
                                max="10"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-heart text-[#bf5f5f]"></i> Modificadores Especiais</h3>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Bônus de HP</label>
                            <input
                                type="number"
                                name="hp_bonus"
                                value="{{ old('hp_bonus', $item->hp_bonus) }}"
                                min="-50"
                                max="100"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Bônus de MP</label>
                            <input
                                type="number"
                                name="mp_bonus"
                                value="{{ old('mp_bonus', $item->mp_bonus) }}"
                                min="-50"
                                max="100"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Dano</label>
                            <input
                                type="number"
                                name="damage"
                                value="{{ old('damage', $item->damage) }}"
                                min="0"
                                max="50"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Classe de Armadura</label>
                            <input
                                type="number"
                                name="armor_class"
                                value="{{ old('armor_class', $item->armor_class) }}"
                                min="0"
                                max="20"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#3a2918]"><i class="fas fa-tag text-[#8a5d0f]"></i> Informações Comerciais</h3>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Preço</label>
                            <input
                                type="number"
                                name="price"
                                value="{{ old('price', $item->price) }}"
                                min="0"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#4a3824]">Raridade</label>
                            <select
                                name="rarity"
                                required
                                class="mt-2 block w-full rounded-2xl border border-slate-300 bg-[#fcf7ee] px-4 py-3 text-sm text-[#2f2419] shadow-sm focus:border-[#2f6fb8] focus:outline-none focus:ring-2 focus:ring-[#2f6fb8]/30"
                            >
                                @foreach($rarities as $key => $label)
                                    <option value="{{ $key }}" {{ old('rarity', $item->rarity) == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-[#2f6fb8] px-5 py-3 text-sm font-semibold text-white shadow-md shadow-[#2f6fb8]/20 hover:bg-[#4c83db] transition">
                        <i class="fas fa-save mr-2"></i> Salvar
                    </button>
                    <a href="{{ route('items.show', $item) }}" class="inline-flex items-center justify-center rounded-2xl border border-[#d8c09b] bg-white px-5 py-3 text-sm font-semibold text-[#8b6a3d] shadow-sm hover:bg-[#f7efe2] transition">
                        <i class="fas fa-times mr-2"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </div>
@endsection
