@extends('layouts.app')

@section('title', $quest->title . ' - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow" style="background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 mb-2">{{ $quest->title }}</h1>
                            <div class="mb-3">
                                <span class="badge me-2" style="background-color: {{ ['easy' => '#4caf50', 'normal' => '#2196F3', 'hard' => '#ff9800', 'legendary' => '#f44336'][$quest->difficulty] ?? '#808080' }};">
                                    {{ $quest->getDifficultyLabel() }}
                                </span>
                                <span class="badge bg-warning">Nível {{ $quest->recommended_level }}+</span>
                                @if($quest->is_repeatable)
                                    <span class="badge bg-info">Repetível</span>
                                @endif
                            </div>
                            <p class="text-white">{{ $quest->description }}</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('quests.edit', $quest) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('quests.index') }}" class="btn btn-secondary">
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
                <div class="card-header bg-success">
                    <h5 class="mb-0"><i class="fas fa-gift"></i> Recompensas</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td><i class="fas fa-coins"></i> Ouro</td>
                                <td><strong>{{ number_format($quest->gold_reward) }}</strong></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-star"></i> Experiência</td>
                                <td><strong>{{ number_format($quest->experience_reward) }}</strong></td>
                            </tr>
                            @if($quest->rewardItem)
                                <tr>
                                    <td><i class="fas fa-treasure-chest"></i> Item</td>
                                    <td>
                                        <a href="{{ route('items.show', $quest->rewardItem) }}" class="badge bg-info">
                                            {{ $quest->rewardItem->name }}
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-info">
                    <h5 class="mb-0"><i class="fas fa-scroll"></i> Detalhes</h5>
                </div>
                <div class="card-body">
                    @if($quest->objectives)
                        <h6>Objetivos:</h6>
                        <p class="text-muted">{{ $quest->objectives }}</p>
                    @endif
                    @if($quest->rewards)
                        <h6>Descrição das Recompensas:</h6>
                        <p class="text-muted">{{ $quest->rewards }}</p>
                    @endif
                    <hr>
                    <small class="text-muted d-block">
                        Criada em {{ $quest->created_at->format('d/m/Y H:i') }}<br>
                        Atualizada em {{ $quest->updated_at->format('d/m/Y H:i') }}
                    </small>
                </div>
            </div>

            <form action="{{ route('quests.destroy', $quest) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja deletar esta missão?');">
                    <i class="fas fa-trash"></i> Deletar Missão
                </button>
            </form>
        </div>
    </div>
@endsection
