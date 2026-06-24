<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-[#f6e7c8]">Meus Personagens</h2>
                <p class="text-sm text-[#d7c08f]">Gerencie seus heróis e acompanhe o progresso.</p>
            </div>
            <a href="{{ route('characters.create') }}" class="inline-flex items-center justify-center rounded-md bg-[#c8862f] px-4 py-2 text-sm font-semibold text-[#1a120c] shadow hover:bg-[#e0a04a]">
                Novo personagem
            </a>
        </div>
    </x-slot>

    <div class="space-y-6">
        @if($characters->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($characters as $character)
                    <div class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h3 class="text-lg font-semibold text-[#2f2419]">{{ $character->name }}</h3>
                                <p class="mt-1 text-sm text-[#8b6a3d]">{{ $character->class }} · Nível {{ $character->level }}</p>
                            </div>
                            <span class="rounded-full bg-[#f7efe2] px-2.5 py-1 text-xs font-semibold text-[#8b6a3d]">{{ $character->level }}</span>
                        </div>

                        <div class="mt-4 space-y-3 text-sm text-[#4f3d28]">
                            <div>
                                <div class="mb-1 flex items-center justify-between">
                                    <span>HP</span>
                                    <span class="font-semibold">{{ $character->hp }}/{{ $character->max_hp }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-[#f2e6ce]">
                                    <div class="h-2 rounded-full bg-[#c75d5d]" style="width: {{ max(5, min(100, ($character->hp / max($character->max_hp, 1)) * 100)) }}%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-1 flex items-center justify-between">
                                    <span>MP</span>
                                    <span class="font-semibold">{{ $character->mp }}/{{ $character->max_mp }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-[#f2e6ce]">
                                    <div class="h-2 rounded-full bg-[#3f7fbf]" style="width: {{ max(5, min(100, ($character->mp / max($character->max_mp, 1)) * 100)) }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <a href="{{ route('characters.show', $character) }}" class="rounded-md bg-[#2b1d12] px-3 py-2 text-sm font-semibold text-[#f6e7c8] hover:bg-[#3d2818]">Ver</a>
                            <a href="{{ route('characters.edit', $character) }}" class="rounded-md border border-[#d8c09b] px-3 py-2 text-sm font-semibold text-[#8b6a3d] hover:bg-[#f7efe2]">Editar</a>
                            <form action="{{ route('characters.destroy', $character) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md bg-[#c75d5d] px-3 py-2 text-sm font-semibold text-white hover:bg-[#a84a4a]" onclick="return confirm('Deseja realmente excluir este personagem?');">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $characters->links() }}
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-[#d8c09b] bg-[#fcf7ee] p-6 text-sm text-[#7a623d]">
                Nenhum personagem cadastrado ainda. <a href="{{ route('characters.create') }}" class="font-semibold text-[#c8862f]">Criar o primeiro</a>.
            </div>
        @endif
    </div>
</x-app-layout>
