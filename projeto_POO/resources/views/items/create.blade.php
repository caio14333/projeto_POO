@extends('layouts.app')

@section('title', 'Novo Item - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5"><i class="fas fa-plus-circle"></i> Criar Novo Item</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h5 class="mb-0">Formulário de Item</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tipo</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                    <option value="">Selecione...</option>
                                    @foreach($types as $key => $label)
                                        <option value="{{ $key }}" {{ old('type') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <h6 class="mt-4 mb-3"><i class="fas fa-star"></i> Modificadores de Atributos</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Força</label>
                                <input type="number" class="form-control" name="strength_bonus" value="{{ old('strength_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Destreza</label>
                                <input type="number" class="form-control" name="dexterity_bonus" value="{{ old('dexterity_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Constituição</label>
                                <input type="number" class="form-control" name="constitution_bonus" value="{{ old('constitution_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Inteligência</label>
                                <input type="number" class="form-control" name="intelligence_bonus" value="{{ old('intelligence_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sabedoria</label>
                                <input type="number" class="form-control" name="wisdom_bonus" value="{{ old('wisdom_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Carisma</label>
                                <input type="number" class="form-control" name="charisma_bonus" value="{{ old('charisma_bonus', 0) }}" min="-10" max="10" required>
                            </div>
                        </div>

                        <h6 class="mt-4 mb-3"><i class="fas fa-heart"></i> Modificadores Especiais</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bônus de HP</label>
                                <input type="number" class="form-control" name="hp_bonus" value="{{ old('hp_bonus', 0) }}" min="-50" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bônus de MP</label>
                                <input type="number" class="form-control" name="mp_bonus" value="{{ old('mp_bonus', 0) }}" min="-50" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dano</label>
                                <input type="number" class="form-control" name="damage" value="{{ old('damage', 0) }}" min="0" max="50" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Classe de Armadura</label>
                                <input type="number" class="form-control" name="armor_class" value="{{ old('armor_class', 0) }}" min="0" max="20" required>
                            </div>
                        </div>

                        <h6 class="mt-4 mb-3"><i class="fas fa-tag"></i> Informações Comerciais</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preço</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price', 0) }}" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Raridade</label>
                                <select class="form-select" name="rarity" required>
                                    @foreach($rarities as $key => $label)
                                        <option value="{{ $key }}" {{ old('rarity', 1) == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Criar Item
                            </button>
                            <a href="{{ route('items.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
