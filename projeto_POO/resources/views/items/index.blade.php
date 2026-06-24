<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-[#f6e7c8]">Catálogo de Itens</h2>
                <p class="text-sm text-[#d7c08f]">Explore armas, armaduras e itens mágicos.</p>
            </div>
            <a href="{{ route('items.create') }}" class="inline-flex items-center justify-center rounded-md bg-[#c8862f] px-4 py-2 text-sm font-semibold text-[#1a120c] shadow hover:bg-[#e0a04a]">
                Novo item
            </a>
        </div>
    </x-slot>

    <div class="space-y-6">
        @if($items->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($items as $item)
                    <div class="rounded-2xl border border-[#d8c09b] bg-white p-6 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <h3 class="text-lg font-semibold text-[#2f2419]">{{ $item->name }}</h3>
                                <p class="mt-1 text-sm text-[#8b6a3d]">{{ $types[$item->type] ?? $item->type }}</p>
                            </div>
                            <span class="rounded-full px-2.5 py-1 text-xs font-semibold text-white" style="background-color: {{ ['1' => '#808080', '2' => '#00aa00', '3' => '#0055ff', '4' => '#aa00ff', '5' => '#ffaa00'][$item->rarity] ?? '#808080' }};">{{ $item->getRarityLabel() }}</span>
                        </div>

                        <p class="mt-4 text-sm text-[#4f3d28]">{{ $item->description }}</p>

                        <div class="mt-4 flex flex-wrap gap-2 text-sm">
                            @if($item->damage > 0)
                                <span class="rounded-full bg-[#fbeaea] px-2.5 py-1 font-semibold text-[#b24a4a]">Dano +{{ $item->damage }}</span>
                            @endif
                            @if($item->armor_class > 0)
                                <span class="rounded-full bg-[#ecf8ed] px-2.5 py-1 font-semibold text-[#3d7f43]">CA +{{ $item->armor_class }}</span>
                            @endif
                        </div>

                        <p class="mt-4 text-sm font-medium text-[#8b6a3d]">Preço: {{ number_format($item->price) }} ouro</p>

                        <div class="mt-5 flex flex-wrap gap-2">
                            <a href="{{ route('items.show', $item) }}" class="rounded-md bg-[#2b1d12] px-3 py-2 text-sm font-semibold text-[#f6e7c8] hover:bg-[#3d2818]">Ver</a>
                            <a href="{{ route('items.edit', $item) }}" class="rounded-md border border-[#d8c09b] px-3 py-2 text-sm font-semibold text-[#8b6a3d] hover:bg-[#f7efe2]">Editar</a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md bg-[#c75d5d] px-3 py-2 text-sm font-semibold text-white hover:bg-[#a84a4a]" onclick="return confirm('Deseja realmente excluir este item?');">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $items->links() }}
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-[#d8c09b] bg-[#fcf7ee] p-6 text-sm text-[#7a623d]">
                Nenhum item cadastrado ainda. <a href="{{ route('items.create') }}" class="font-semibold text-[#c8862f]">Criar o primeiro</a>.
            </div>
        @endif
    </div>
</x-app-layout>
