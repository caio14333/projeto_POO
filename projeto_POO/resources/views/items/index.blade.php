@extends('layouts.app')

@section('title', 'Catálogo de Itens - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="display-5">
                <i class="fas fa-treasure-chest"></i> Catálogo de Itens
            </h1>
            <a href="{{ route('items.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Novo Item
            </a>
        </div>
    </div>

    @if($items->count() > 0)
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header text-white" style="background-color: {{ ['1' => '#808080', '2' => '#00aa00', '3' => '#0055ff', '4' => '#aa00ff', '5' => '#ffaa00'][$item->rarity] ?? '#808080' }};">
                            <h6 class="mb-0">
                                <i class="fas fa-gem"></i> {{ $item->name }}
                                <span class="badge float-end bg-light text-dark">{{ $item->getRarityLabel() }}</span>
                            </h6>
                        </div>
                        <div class="card-body small">
                            <p class="mb-2">
                                <strong>{{ $types[$item->type] ?? $item->type }}</strong><br>
                                <span class="text-muted">{{ $item->description }}</span>
                            </p>

                            @if($item->damage > 0 || $item->armor_class > 0)
                                <div class="mb-2">
                                    @if($item->damage > 0)
                                        <span class="badge bg-danger">Dano: +{{ $item->damage }}</span>
                                    @endif
                                    @if($item->armor_class > 0)
                                        <span class="badge bg-success">CA: +{{ $item->armor_class }}</span>
                                    @endif
                                </div>
                            @endif

                            <div class="mt-2">
                                <small class="text-muted d-block">
                                    <i class="fas fa-coins"></i> Preço: {{ number_format($item->price) }} ouro
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-info me-2">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-12">
                {{ $items->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            Nenhum item disponível ainda!
            <a href="{{ route('items.create') }}" class="alert-link">Crie um novo item</a>
        </div>
    @endif
@endsection
