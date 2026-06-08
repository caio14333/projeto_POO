@extends('layouts.app')

@section('title', 'Dashboard - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5">
                <i class="fas fa-crown"></i> Bem-vindo, {{ Auth::user()->name }}!
            </h1>
            <p class="text-muted">Gerencie seus personagens e explore a taverna</p>
        </div>
    </div>

    <!-- Cards de Atalhos -->
    <div class="row">
        <!-- Card Personagens -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-user-secret fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">
                        <i class="fas fa-users"></i> Personagens
                    </h5>
                    <p class="card-text text-muted small">Crie, edite e gerencie seus heróis</p>
                    <a href="{{ route('characters.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-right"></i> Ir para Personagens
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Itens -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-sword fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">
                        <i class="fas fa-treasure-chest"></i> Inventário
                    </h5>
                    <p class="card-text text-muted small">Explore armas, armaduras e itens mágicos</p>
                    <a href="{{ route('items.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-right"></i> Ver Itens
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Quests -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <i class="fas fa-map-marked-alt fa-3x text-success mb-3"></i>
                    <h5 class="card-title">
                        <i class="fas fa-scroll"></i> Missões
                    </h5>
                    <p class="card-text text-muted small">Aceite quests e ganhe recompensas</p>
                    <a href="{{ route('quests.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-arrow-right"></i> Ver Missões
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Personagens Recentes -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">
                <i class="fas fa-history"></i> Seus Personagens
            </h3>

            @if(Auth::user()->characters->count() > 0)
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th><i class="fas fa-portrait"></i> Nome</th>
                                <th><i class="fas fa-user-tag"></i> Classe</th>
                                <th><i class="fas fa-layer-group"></i> Nível</th>
                                <th><i class="fas fa-heart"></i> HP</th>
                                <th><i class="fas fa-wand-magic-sparkles"></i> MP</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->characters as $character)
                                <tr>
                                    <td><strong>{{ $character->name }}</strong></td>
                                    <td>{{ $character->class }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $character->level }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $character->hp }}/{{ $character->max_hp }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $character->mp }}/{{ $character->max_mp }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('characters.show', $character) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> Você ainda não tem nenhum personagem!
                    <a href="{{ route('characters.create') }}" class="alert-link">Criar um novo personagem</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Estatísticas -->
    <div class="row mt-5">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Total de Personagens</h5>
                    <h2 class="display-6 text-primary">{{ Auth::user()->characters->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Personagem Nível Mais Alto</h5>
                    <h2 class="display-6 text-warning">
                        {{ Auth::user()->characters->max('level') ?? '0' }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Total de Itens</h5>
                    <h2 class="display-6 text-danger">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-muted">Quests Completas</h5>
                    <h2 class="display-6 text-success">0</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
