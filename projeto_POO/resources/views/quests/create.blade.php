@extends('layouts.app')

@section('title', 'Nova Missão - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5"><i class="fas fa-plus-circle"></i> Criar Nova Missão</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h5 class="mb-0">Formulário de Missão</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('quests.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Objetivos</label>
                            <textarea class="form-control" name="objectives" rows="3">{{ old('objectives') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Recompensas (descrição)</label>
                            <textarea class="form-control" name="rewards" rows="3">{{ old('rewards') }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nível Recomendado</label>
                                <input type="number" class="form-control" name="recommended_level" value="{{ old('recommended_level', 1) }}" min="1" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dificuldade</label>
                                <select class="form-select" name="difficulty" required>
                                    @foreach($difficulties as $key => $label)
                                        <option value="{{ $key }}" {{ old('difficulty', 'normal') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Recompensa em Ouro</label>
                                <input type="number" class="form-control" name="gold_reward" value="{{ old('gold_reward', 0) }}" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Recompensa em XP</label>
                                <input type="number" class="form-control" name="experience_reward" value="{{ old('experience_reward', 0) }}" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Item de Recompensa</label>
                                <select class="form-select" name="reward_item_id">
                                    <option value="">Nenhum</option>
                                    @foreach($items as $item)
                                        <option value="{{ $item->id }}" {{ old('reward_item_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Ativa</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_repeatable" name="is_repeatable" value="1" {{ old('is_repeatable') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_repeatable">Repetível</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Criar Missão
                            </button>
                            <a href="{{ route('quests.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
