@extends('layouts.app')

@section('title', 'Novo Personagem - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5">
                <i class="fas fa-user-circle"></i> Criar Novo Personagem
            </h1>
            <p class="text-muted">Escolha seus atributos e classe com cuidado, eles definem seu destino!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h5 class="mb-0">Gerador de Personagem</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('characters.store') }}" method="POST">
                        @csrf

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
                                value="{{ old('name') }}"
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
                                    <option value="{{ $cls }}" {{ old('class') === $cls ? 'selected' : '' }}>
                                        {{ $cls }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <strong>Dicas de Classes:</strong><br>
                                • <strong>Warrior</strong>: Alto STR, bom DEX - Especialista em combate corpo a corpo<br>
                                • <strong>Mage</strong>: Alto INT, bom WIS - Domina magia e feitiços<br>
                                • <strong>Rogue</strong>: Alto DEX, bom CHA - Rápido e furtivo<br>
                                • <strong>Paladin</strong>: Alto STR e WIS - Guerreiro sagrado<br>
                                • <strong>Ranger</strong>: Alto DEX e WIS - Caçador experiente<br>
                                • <strong>Barbarian</strong>: Alto STR, baixa INT - Guerreiro selvagem
                            </small>
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
                                    value="{{ old('strength', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Ataque físico e dano melhorado (1-20)</small>
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
                                    value="{{ old('dexterity', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Defesa e esquiva (1-20)</small>
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
                                    value="{{ old('constitution', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Pontos de Vida (HP) (1-20)</small>
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
                                    value="{{ old('intelligence', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Pontos de Mana (MP) (1-20)</small>
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
                                    value="{{ old('wisdom', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Percepção e resistência mental (1-20)</small>
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
                                    value="{{ old('charisma', 10) }}"
                                    min="1"
                                    max="20"
                                    required
                                >
                                <small class="text-muted">Persuasão e liderança (1-20)</small>
                                @error('charisma')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nível Inicial -->
                        <div class="mb-3">
                            <label for="level" class="form-label">
                                <i class="fas fa-trophy"></i> Nível Inicial
                            </label>
                            <input
                                type="number"
                                class="form-control @error('level') is-invalid @enderror"
                                id="level"
                                name="level"
                                value="{{ old('level', 1) }}"
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
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-check-circle"></i> Criar Personagem
                            </button>
                            <a href="{{ route('characters.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times-circle"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Barra Lateral - Info -->
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header bg-info">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Dica de Atributos</h5>
                </div>
                <div class="card-body small">
                    <p class="mb-2"><strong>Total de Pontos por Atributo: 10</strong></p>
                    <p class="mb-0 text-muted">Distribua 6 atributos com valores entre 1 e 20 para criar seu personagem único!</p>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header bg-success">
                    <h5 class="mb-0"><i class="fas fa-heart"></i> Cálculo de HP/MP</h5>
                </div>
                <div class="card-body small">
                    <p class="mb-2"><strong>HP:</strong></p>
                    <p class="mb-2">Base: 100 + (CON × 5)</p>
                    <p class="mb-3">Exemplo: CON=15 → 100 + 75 = 175 HP</p>

                    <p class="mb-2"><strong>MP:</strong></p>
                    <p>Base: 50 + (INT × 3)</p>
                    <p>Exemplo: INT=15 → 50 + 45 = 95 MP</p>
                </div>
            </div>
        </div>
    </div>
@endsection
