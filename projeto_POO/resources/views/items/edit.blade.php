@extends('layouts.app')

@section('title', 'Editar ' . $item->name . ' - Taverna do Aventureiro')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5"><i class="fas fa-edit"></i> Editar Item: {{ $item->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Editar Informações</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('items.update', $item) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item->name) }}" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tipo</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                    @foreach($types as $key => $label)
                                        <option value="{{ $key }}" {{ old('type', $item->type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description', $item->description) }}</textarea>
                        </div>

                        <h6 class="mt-4 mb-3">Modificadores de Atributos</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Força</label>
                                <input type="number" class="form-control" name="strength_bonus" value="{{ old('strength_bonus', $item->strength_bonus) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Destreza</label>
                                <input type="number" class="form-control" name="dexterity_bonus" value="{{ old('dexterity_bonus', $item->dexterity_bonus) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Constituição</label>
                                <input type="number" class="form-control" name="constitution_bonus" value="{{ old('constitution_bonus', $item->constitution_bonus) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Inteligência</label>
                                <input type="number" class="form-control" name="intelligence_bonus" value="{{ old('intelligence_bonus', $item->intelligence_bonus) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sabedoria</label>
                                <input type="number" class="form-control" name="wisdom_bonus" value="{{ old('wisdom_bonus', $item->wisdom_bonus) }}" min="-10" max="10" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Carisma</label>
                                <input type="number" class="form-control" name="charisma_bonus" value="{{ old('charisma_bonus', $item->charisma_bonus) }}" min="-10" max="10" required>
                            </div>
                        </div>

                        <h6 class="mt-4 mb-3">Modificadores Especiais</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bônus de HP</label>
                                <input type="number" class="form-control" name="hp_bonus" value="{{ old('hp_bonus', $item->hp_bonus) }}" min="-50" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bônus de MP</label>
                                <input type="number" class="form-control" name="mp_bonus" value="{{ old('mp_bonus', $item->mp_bonus) }}" min="-50" max="100" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Dano</label>
                                <input type="number" class="form-control" name="damage" value="{{ old('damage', $item->damage) }}" min="0" max="50" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Classe de Armadura</label>
                                <input type="number" class="form-control" name="armor_class" value="{{ old('armor_class', $item->armor_class) }}" min="0" max="20" required>
                            </div>
                        </div>

                        <h6 class="mt-4 mb-3">Informações Comerciais</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preço</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price', $item->price) }}" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Raridade</label>
                                <select class="form-select" name="rarity" required>
                                    @foreach($rarities as $key => $label)
                                        <option value="{{ $key }}" {{ old('rarity', $item->rarity) == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="fas fa-save"></i> Salvar
                            </button>
                            <a href="{{ route('items.show', $item) }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
