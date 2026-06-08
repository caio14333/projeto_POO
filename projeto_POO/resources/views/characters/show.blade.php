@extends('layouts.app')

@section('title', $character->name . ' - Taverna do Aventureiro')

@section('content')
    <!-- Cabeçalho do Personagem -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow" style="background: linear-gradient(135deg, #8b4513 0%, #d2691e 100%);">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 mb-2">{{ $character->name }}</h1>
                            <div class="mb-3">
                                <span class="badge bg-light text-dark me-2">{{ $character->class }}</span>
                                <span class="badge bg-warning">Nível {{ $character->level }}</span>
                                <span class="badge bg-info">XP: {{ number_format($character->experience) }}</span>
                            </div>
                            <p class="mb-0 text-white-50">
                                <i class="fas fa-calendar"></i> Criado em {{ $character->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('characters.edit', $character) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('characters.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs de Conteúdo -->
    <ul class="nav nav-tabs mb-4" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" role="tab">
                <i class="fas fa-chart-bar"></i> Atributos
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory" type="button" role="tab">
                <i class="fas fa-bag"></i> Inventário
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="quests-tab" data-bs-toggle="tab" data-bs-target="#quests" type="button" role="tab">
                <i class="fas fa-scroll"></i> Missões
            </button>
        </li>
    </ul>

    <!-- Conteúdo das Tabs -->
    <div class="tab-content">
        <!-- Tab 1: Atributos -->
        <div class="tab-pane fade show active" id="stats" role="tabpanel">
            <div class="row">
                <!-- HP e MP -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <h5 class="mb-0"><i class="fas fa-heart"></i> Vitalidade</h5>
                        </div>
                        <div class="card-body">
                            <!-- HP -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>Pontos de Vida</strong>
                                    <span class="badge bg-danger">{{ $character->hp }}/{{ $character->max_hp }}</span>
                                </div>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($character->hp / $character->max_hp) * 100 }}%">
                                        <small>{{ round(($character->hp / $character->max_hp) * 100) }}%</small>
                                    </div>
                                </div>
                            </div>

                            <!-- MP -->
                            <div>
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>Pontos de Mana</strong>
                                    <span class="badge bg-info">{{ $character->mp }}/{{ $character->max_mp }}</span>
                                </div>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($character->mp / $character->max_mp) * 100 }}%">
                                        <small>{{ round(($character->mp / $character->max_mp) * 100) }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atributos Base -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-header bg-info">
                            <h5 class="mb-0"><i class="fas fa-dice-d20"></i> Atributos Base</h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-4 mb-3">
                                    <div class="p-3 rounded" style="background-color: rgba(255, 69, 0, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #ff4500;">{{ $character->strength }}</strong>
                                        <small class="text-muted">Força</small>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="p-3 rounded" style="background-color: rgba(50, 205, 50, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #32cd32;">{{ $character->dexterity }}</strong>
                                        <small class="text-muted">Destreza</small>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="p-3 rounded" style="background-color: rgba(255, 165, 0, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #ffa500;">{{ $character->constitution }}</strong>
                                        <small class="text-muted">Constituição</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-3 rounded" style="background-color: rgba(30, 144, 255, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #1e90ff;">{{ $character->intelligence }}</strong>
                                        <small class="text-muted">Inteligência</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-3 rounded" style="background-color: rgba(128, 0, 128, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #800080;">{{ $character->wisdom }}</strong>
                                        <small class="text-muted">Sabedoria</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-3 rounded" style="background-color: rgba(220, 20, 60, 0.1);">
                                        <strong class="d-block" style="font-size: 1.5rem; color: #dc143c;">{{ $character->charisma }}</strong>
                                        <small class="text-muted">Carisma</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Atributos Com Equipamento -->
            @if($bonuses['strength'] > 0 || $bonuses['dexterity'] > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header bg-warning">
                                <h5 class="mb-0"><i class="fas fa-crown"></i> Atributos Com Equipamento</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th>Atributo</th>
                                                <th class="text-center">Base</th>
                                                <th class="text-center">Bônus</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Força</td>
                                                <td class="text-center">{{ $character->strength }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['strength'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['strength'] }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Destreza</td>
                                                <td class="text-center">{{ $character->dexterity }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['dexterity'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['dexterity'] }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Constituição</td>
                                                <td class="text-center">{{ $character->constitution }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['constitution'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['constitution'] }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Inteligência</td>
                                                <td class="text-center">{{ $character->intelligence }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['intelligence'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['intelligence'] }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Sabedoria</td>
                                                <td class="text-center">{{ $character->wisdom }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['wisdom'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['wisdom'] }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Carisma</td>
                                                <td class="text-center">{{ $character->charisma }}</td>
                                                <td class="text-center text-success">+{{ $bonuses['charisma'] }}</td>
                                                <td class="text-center"><strong>{{ $totalStats['charisma'] }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Tab 2: Inventário -->
        <div class="tab-pane fade" id="inventory" role="tabpanel">
            @if($items->count() > 0)
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header" style="background-color: rgba(210, 105, 30, 0.3);">
                                    <h6 class="mb-0">
                                        {{ $item->name }}
                                        <span class="badge float-end" style="background-color: #{{ ['1' => '808080', '2' => '00aa00', '3' => '0055ff', '4' => 'aa00ff', '5' => 'ffaa00'][$item->rarity] ?? '808080' }};">
                                            {{ $item->getRarityLabel() }}
                                        </span>
                                    </h6>
                                </div>
                                <div class="card-body small">
                                    <p class="mb-2">
                                        <strong>{{ $item->type }}</strong><br>
                                        <span class="text-muted">{{ $item->description }}</span>
                                    </p>
                                    @if($item->pivot->is_equipped)
                                        <span class="badge bg-success mb-2">Equipado</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    {{ $items->links() }}
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> O inventário está vazio! Explore o mundo para encontrar itens.
                </div>
            @endif
        </div>

        <!-- Tab 3: Missões -->
        <div class="tab-pane fade" id="quests" role="tabpanel">
            @if($quests->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th>Missão</th>
                                <th>Dificuldade</th>
                                <th>Status</th>
                                <th>Recompensa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quests as $quest)
                                <tr>
                                    <td>{{ $quest->title }}</td>
                                    <td>
                                        <span class="badge" style="background-color: {{ ['easy' => '#4caf50', 'normal' => '#2196F3', 'hard' => '#ff9800', 'legendary' => '#f44336'][$quest->difficulty] ?? '#808080' }};">
                                            {{ $quest->getDifficultyLabel() }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($quest->pivot->is_completed)
                                            <span class="badge bg-success">Completa</span>
                                        @elseif($quest->pivot->status === 'in_progress')
                                            <span class="badge bg-warning">Em Progresso</span>
                                        @else
                                            <span class="badge bg-secondary">Disponível</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small>
                                            <i class="fas fa-coins"></i> {{ $quest->gold_reward }} XP
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $quests->links() }}
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> Nenhuma missão ainda! Acesse a aba de Missões para começar uma aventura.
                </div>
            @endif
        </div>
    </div>
@endsection
