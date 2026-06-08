@extends('layouts.app')

@section('title', 'Missões - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="display-5">
                <i class="fas fa-scroll"></i> Missões Disponíveis
            </h1>
            <a href="{{ route('quests.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Nova Missão
            </a>
        </div>
    </div>

    @if($quests->count() > 0)
        <div class="row">
            @foreach($quests as $quest)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header" style="background-color: {{ ['easy' => '#4caf50', 'normal' => '#2196F3', 'hard' => '#ff9800', 'legendary' => '#f44336'][$quest->difficulty] ?? '#808080' }};">
                            <h6 class="mb-0 text-white">
                                {{ $quest->title }}
                                <span class="badge float-end bg-light text-dark">Nível {{ $quest->recommended_level }}+</span>
                            </h6>
                        </div>
                        <div class="card-body small">
                            <p class="mb-2 text-muted">{{ Str::limit($quest->description, 100) }}</p>
                            <div class="mb-2">
                                <span class="badge" style="background-color: {{ ['easy' => '#4caf50', 'normal' => '#2196F3', 'hard' => '#ff9800', 'legendary' => '#f44336'][$quest->difficulty] ?? '#808080' }};">
                                    {{ $difficulties[$quest->difficulty] ?? $quest->difficulty }}
                                </span>
                                @if($quest->is_repeatable)
                                    <span class="badge bg-info">Repetível</span>
                                @endif
                            </div>
                            <div class="mt-2">
                                <small class="text-muted d-block">
                                    <i class="fas fa-coins"></i> {{ number_format($quest->gold_reward) }} ouro |
                                    <i class="fas fa-star"></i> {{ number_format($quest->experience_reward) }} XP
                                </small>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <a href="{{ route('quests.show', $quest) }}" class="btn btn-sm btn-info me-2">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('quests.edit', $quest) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('quests.destroy', $quest) }}" method="POST" style="display: inline;">
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
                {{ $quests->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation-triangle"></i>
            Nenhuma missão disponível ainda!
            <a href="{{ route('quests.create') }}" class="alert-link">Crie uma nova missão</a>
        </div>
    @endif
@endsection
