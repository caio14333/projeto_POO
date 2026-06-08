@extends('layouts.app')

@section('title', $item->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow" style="background: linear-gradient(135deg, #8b4513 0%, #d2691e 100%);">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 mb-2">{{ $item->name }}</h1>
                            <div class="mb-3">
                                <span class="badge me-2" style="background-color: {{ ['1' => '#808080', '2' => '#00aa00', '3' => '#0055ff', '4' => '#aa00ff', '5' => '#ffaa00'][$item->rarity] ?? '#808080' }};">
                                    {{ $item->getRarityLabel() }}
                                </span>
                                <span class="badge bg-info">{{ $item->type }}</span>
                            </div>
                            <p class="text-white-50">{{ $item->description }}</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('items.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-info">
                    <h5 class="mb-0"><i class="fas fa-star"></i> Atributos</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Força</td>
                                <td><span class="badge bg-{{ $item->strength_bonus > 0 ? 'success' : ($item->strength_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->strength_bonus > 0 ? '+' : '' }}{{ $item->strength_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Destreza</td>
                                <td><span class="badge bg-{{ $item->dexterity_bonus > 0 ? 'success' : ($item->dexterity_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->dexterity_bonus > 0 ? '+' : '' }}{{ $item->dexterity_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Constituição</td>
                                <td><span class="badge bg-{{ $item->constitution_bonus > 0 ? 'success' : ($item->constitution_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->constitution_bonus > 0 ? '+' : '' }}{{ $item->constitution_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Inteligência</td>
                                <td><span class="badge bg-{{ $item->intelligence_bonus > 0 ? 'success' : ($item->intelligence_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->intelligence_bonus > 0 ? '+' : '' }}{{ $item->intelligence_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Sabedoria</td>
                                <td><span class="badge bg-{{ $item->wisdom_bonus > 0 ? 'success' : ($item->wisdom_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->wisdom_bonus > 0 ? '+' : '' }}{{ $item->wisdom_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Carisma</td>
                                <td><span class="badge bg-{{ $item->charisma_bonus > 0 ? 'success' : ($item->charisma_bonus < 0 ? 'danger' : 'secondary') }}">{{ $item->charisma_bonus > 0 ? '+' : '' }}{{ $item->charisma_bonus }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-success">
                    <h5 class="mb-0"><i class="fas fa-heart"></i> Especiais</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Bônus de HP</td>
                                <td><span class="badge bg-{{ $item->hp_bonus > 0 ? 'success' : 'secondary' }}">{{ $item->hp_bonus > 0 ? '+' : '' }}{{ $item->hp_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Bônus de MP</td>
                                <td><span class="badge bg-{{ $item->mp_bonus > 0 ? 'success' : 'secondary' }}">{{ $item->mp_bonus > 0 ? '+' : '' }}{{ $item->mp_bonus }}</span></td>
                            </tr>
                            <tr>
                                <td>Dano</td>
                                <td><span class="badge bg-danger">{{ $item->damage }}</span></td>
                            </tr>
                            <tr>
                                <td>Classe de Armadura</td>
                                <td><span class="badge bg-warning">{{ $item->armor_class }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Preço</strong></td>
                                <td><strong><i class="fas fa-coins"></i> {{ number_format($item->price) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <form action="{{ route('items.destroy', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja deletar este item?');">
                    <i class="fas fa-trash"></i> Deletar Item
                </button>
            </form>
        </div>
    </div>
@endsection
