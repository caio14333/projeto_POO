@extends('layouts.app')

@section('title', 'Editar ' . $character->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5">
                <i class="fas fa-edit"></i> Editar Personagem: {{ $character->name }}
            </h1>
            <p class="text-muted">Ajuste os atributos e informações do seu herói</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Editar Informações</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('characters.update', $character) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nome do Personagem -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-scroll"></i> Nome do Personagem
                            </label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name', $character->name) }}"
                                placeholder="Ex: Aragorn, Merlin, Legolas"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Classe -->
                        <div class="mb-3">
                            <label for="class" class="form-label">
                                <i class="fas fa-user-tag"></i> Classe
                            </label>
                            <select class="form-select @error('class') is-invalid @enderror" id="class" name="class" required>
                                <option value="">Selecione uma classe...</option>
                                @foreach($classes as $cls)
                                    <option value="{{ $cls }}" {{ old('class', $character->class) === $cls ? 'selected' : '' }}>
                                        {{ $cls }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Atributos -->
                        <div class="row">
                            <!-- Força -->
                            <div class="col-md-6 mb-3">
                                <label for="strength" class="form-label">
                                    <i class="fas fa-fist-raised text-danger"></i> Força (STR)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('strength') is-invalid @enderror"
                                    id="strength"
                                    name="strength"
                                    value="{{ old('strength', $character->strength) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('strength')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Destreza -->
                            <div class="col-md-6 mb-3">
                                <label for="dexterity" class="form-label">
                                    <i class="fas fa-running text-success"></i> Destreza (DEX)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('dexterity') is-invalid @enderror"
                                    id="dexterity"
                                    name="dexterity"
                                    value="{{ old('dexterity', $character->dexterity) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('dexterity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Constituição -->
                            <div class="col-md-6 mb-3">
                                <label for="constitution" class="form-label">
                                    <i class="fas fa-shield-alt text-warning"></i> Constituição (CON)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('constitution') is-invalid @enderror"
                                    id="constitution"
                                    name="constitution"
                                    value="{{ old('constitution', $character->constitution) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('constitution')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Inteligência -->
                            <div class="col-md-6 mb-3">
                                <label for="intelligence" class="form-label">
                                    <i class="fas fa-brain text-info"></i> Inteligência (INT)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('intelligence') is-invalid @enderror"
                                    id="intelligence"
                                    name="intelligence"
                                    value="{{ old('intelligence', $character->intelligence) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('intelligence')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sabedoria -->
                            <div class="col-md-6 mb-3">
                                <label for="wisdom" class="form-label">
                                    <i class="fas fa-lightbulb text-warning"></i> Sabedoria (WIS)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('wisdom') is-invalid @enderror"
                                    id="wisdom"
                                    name="wisdom"
                                    value="{{ old('wisdom', $character->wisdom) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('wisdom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Carisma -->
                            <div class="col-md-6 mb-3">
                                <label for="charisma" class="form-label">
                                    <i class="fas fa-star text-success"></i> Carisma (CHA)
                                </label>
                                <input
                                    type="number"
                                    class="form-control @error('charisma') is-invalid @enderror"
                                    id="charisma"
                                    name="charisma"
                                    value="{{ old('charisma', $character->charisma) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                @error('charisma')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nível -->
                        <div class="mb-3">
                            <label for="level" class="form-label">
                                <i class="fas fa-trophy"></i> Nível
                            </label>
                            <input
                                type="number"
                                class="form-control @error('level') is-invalid @enderror"
                                id="level"
                                name="level"
                                value="{{ old('level', $character->level) }}"
                                min="1"
                                max="100"
                                required
                            >
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botões de Ação -->
                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="fas fa-save"></i> Salvar Alterações
                            </button>
                            <a href="{{ route('characters.show', $character) }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times-circle"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Barra Lateral - Info -->
        <div class="col-md-4">
            <div class="card shadow mb-3 bg-warning-subtle">
                <div class="card-header bg-warning">
                    <h5 class="mb-0"><i class="fas fa-user-circle"></i> Status Atual</h5>
                </div>
                <div class="card-body small">
                    <ul class="list-unstyled">
                        <li><strong>Nome:</strong> {{ $character->name }}</li>
                        <li><strong>Classe:</strong> {{ $character->class }}</li>
                        <li><strong>Nível:</strong> {{ $character->level }}</li>
                        <li><strong>Experiência:</strong> {{ number_format($character->experience) }}</li>
                        <li><strong>HP:</strong> {{ $character->hp }}/{{ $character->max_hp }}</li>
                        <li><strong>MP:</strong> {{ $character->mp }}/{{ $character->max_mp }}</li>
                        <li><strong>Criado em:</strong> {{ $character->created_at->format('d/m/Y H:i') }}</li>
                        <li><strong>Última atualização:</strong> {{ $character->updated_at->format('d/m/Y H:i') }}</li>
                    </ul>
                </div>
            </div>

            <div class="alert alert-info" role="alert">
                <i class="fas fa-lightbulb"></i>
                <strong>Dica:</strong> Alterar Constituição e Inteligência recalculará HP e MP automaticamente!
            </div>
        </div>
    </div>
@endsection
