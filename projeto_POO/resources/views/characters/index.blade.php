<x-app-layout src="https://cdn.tailwindcss.com">

@extends('layouts.app')

@section('title', 'Meus Personagens - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="display-5">
                <i class="fas fa-users"></i> Meus Personagens
            </h1>
            <a href="{{ route('characters.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Novo Personagem
            </a>
        </div>
    </div>

    @if($characters->count() > 0)
        <!-- Grid de Personagens -->
        <div class="row">
            @foreach($characters as $character)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #8b4513 0%, #d2691e 100%);">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-user-circle"></i> {{ $character->name }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Classe e Nível -->
                            <div class="mb-3">
                                <span class="badge bg-info me-2">{{ $character->class }}</span>
                                <span class="badge bg-warning">Nível {{ $character->level }}</span>
                            </div>

                            <!-- HP e MP -->
                            <div class="mb-3">
                                <div class="mb-2">
                                    <small class="d-flex justify-content-between">
                                        <span><i class="fas fa-heart text-danger"></i> HP</span>
                                        <span>{{ $character->hp }}/{{ $character->max_hp }}</span>
                                    </small>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($character->hp / $character->max_hp) * 100 }}%"></div>
                                    </div>
                                </div>
                                <div>
                                    <small class="d-flex justify-content-between">
                                        <span><i class="fas fa-wand-magic-sparkles text-info"></i> MP</span>
                                        <span>{{ $character->mp }}/{{ $character->max_mp }}</span>
                                    </small>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($character->mp / $character->max_mp) * 100 }}%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Experiência -->
                            <div class="mb-3">
                                <small class="text-muted">Experiência: {{ number_format($character->experience) }}</small>
                            </div>

                            <!-- Atributos Principais -->
                            <div class="small mb-3">
                                <div class="row text-center">
                                    <div class="col-6 mb-2">
                                        <strong class="text-danger">{{ $character->strength }}</strong><br>
                                        <small class="text-muted">Força</small>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <strong class="text-success">{{ $character->dexterity }}</strong><br>
                                        <small class="text-muted">Destreza</small>
                                    </div>
                                    <div class="col-6">
                                        <strong class="text-warning">{{ $character->constitution }}</strong><br>
                                        <small class="text-muted">Constituição</small>
                                    </div>
                                    <div class="col-6">
                                        <strong class="text-info">{{ $character->intelligence }}</strong><br>
                                        <small class="text-muted">Inteligência</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('characters.show', $character) }}" class="btn btn-sm btn-info me-2">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('characters.edit', $character) }}" class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('characters.destroy', $character) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este personagem?');">
                                    <i class="fas fa-trash"></i> Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="row mt-4">
            <div class="col-12">
                {{ $characters->links() }}
            </div>
        </div>
    @else
        <!-- Mensagem Vazia -->
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle"></i>
            <strong>Nenhum personagem criado!</strong>
            <a href="{{ route('characters.create') }}" class="alert-link">Crie seu primeiro personagem agora</a>
        </div>
    @endif
@endsection

    </x-app-layout>
