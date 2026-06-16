@extends('layouts.app')

@section('title', 'Taverna do Aventureiro ')

@section('content')
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="display-1 mb-4">
                <i class="fas fa-dungeon" style="color: #d2691e;"></i>
            </div>
            <h1 class="display-3 fw-bold mb-3">Bem-vindo à Taverna do Aventureiro</h1>
            <p class="lead text-muted mb-4">
                Um RPG completo desenvolvido em Laravel com Programação Orientada a Objetos
            </p>

            @if(Auth::check())
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-play-circle"></i> Voltar ao Jogo
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-user-plus"></i> Criar Conta
                </a>
            @endif
        </div>
    </div>

    <!-- Features -->
    <div class="row my-5">
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-user-secret fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Crie Seus Heróis</h5>
                    <p class="card-text text-muted">
                        Escolha seus atributos (Força, Destreza, etc.) e monte um personagem único com diferentes classes.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-sword fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Explore o Inventário</h5>
                    <p class="card-text text-muted">
                        Colete armas, armaduras e itens mágicos para potencializar seu personagem com bônus de atributos.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-map-marked-alt fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Aceite Missões</h5>
                    <p class="card-text text-muted">
                        Ganhe experiência e ouro completando quests de diferentes dificuldades com recompensas épicas.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @if(!Auth::check())
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h2 class="mb-4">Pronto para começar sua aventura?</h2>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-user-plus"></i> Criar Conta Agora
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-sign-in-alt"></i> Já tenho conta
                </a>
            </div>
        </div>
    @endif
@endsection
