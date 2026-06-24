<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-[#f6e7c8]">Dashboard</h2>
                <p class="text-sm text-[#d7c08f]">Bem-vindo de volta, {{ Auth::user()->name }}.</p>
            </div>
            <a href="{{ route('characters.create') }}" class="inline-flex items-center justify-center rounded-md bg-[#c8862f] px-4 py-2 text-sm font-semibold text-[#1a120c] shadow hover:bg-[#e0a04a]">
                Criar personagem
            </a>
        </div>
    </x-slot>

    <div class="space-y-8">
        <section class="grid gap-6 md:grid-cols-3">
            <div class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-[#8b6a3d]">Personagens</p>
                <p class="mt-3 text-3xl font-bold text-[#2f2419]">{{ Auth::user()->characters->count() }}</p>
            </div>
            <div class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-[#8b6a3d]">Itens cadastrados</p>
                <p class="mt-3 text-3xl font-bold text-[#2f2419]">{{ \App\Models\Item::count() }}</p>
            </div>
            <div class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-[#8b6a3d]">Quests</p>
                <p class="mt-3 text-3xl font-bold text-[#2f2419]">{{ \App\Models\Quest::count() }}</p>
            </div>
        </section>

        <section class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#2f2419]">Seus personagens</h3>
                <a href="{{ route('characters.index') }}" class="text-sm font-medium text-[#c8862f] hover:text-[#a2671d]">Ver todos</a>
            </div>

            @if(Auth::user()->characters->isNotEmpty())
                <div class="mt-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#e9dcc4]">
                        <thead>
                            <tr class="text-left text-sm text-[#8b6a3d]">
                                <th class="px-3 py-2">Nome</th>
                                <th class="px-3 py-2">Classe</th>
                                <th class="px-3 py-2">Nível</th>
                                <th class="px-3 py-2">HP</th>
                                <th class="px-3 py-2">MP</th>
                                <th class="px-3 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f2e6ce]">
                            @foreach(Auth::user()->characters as $character)
                                <tr class="text-sm text-[#2f2419]">
                                    <td class="px-3 py-3 font-semibold">{{ $character->name }}</td>
                                    <td class="px-3 py-3">{{ $character->class }}</td>
                                    <td class="px-3 py-3"><span class="rounded-full bg-[#f7efe2] px-2.5 py-1 text-xs font-semibold text-[#8b6a3d]">{{ $character->level }}</span></td>
                                    <td class="px-3 py-3">{{ $character->hp }}/{{ $character->max_hp }}</td>
                                    <td class="px-3 py-3">{{ $character->mp }}/{{ $character->max_mp }}</td>
                                    <td class="px-3 py-3">
                                        <a href="{{ route('characters.show', $character) }}" class="text-sm font-semibold text-[#c8862f] hover:text-[#a2671d]">Visualizar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="mt-6 rounded-lg border border-dashed border-[#d8c09b] bg-[#fcf7ee] p-4 text-sm text-[#7a623d]">
                    Você ainda não criou nenhum personagem. <a href="{{ route('characters.create') }}" class="font-semibold text-[#c8862f]">Criar agora</a>.
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
