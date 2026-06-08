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

    <!-- Tech Stack -->
    <div class="row my-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h5 class="mb-0"><i class="fas fa-code"></i> Tecnologias Utilizadas</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <h6 class="mb-2">Backend</h6>
                            <div class="badge bg-danger me-2" style="font-size: 0.9rem;">Laravel 11</div>
                            <div class="badge bg-danger" style="font-size: 0.9rem;">PHP 8+</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6 class="mb-2">Banco de Dados</h6>
                            <div class="badge bg-warning" style="font-size: 0.9rem;">SQLite</div>
                            <div class="badge bg-warning" style="font-size: 0.9rem;">Migrations</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6 class="mb-2">Frontend</h6>
                            <div class="badge bg-success me-2" style="font-size: 0.9rem;">Bootstrap 5</div>
                            <div class="badge bg-success" style="font-size: 0.9rem;">Blade Templates</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- POO Concepts -->
    <div class="row my-5">
        <div class="col-12">
            <div class="card shadow bg-light">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-cube"></i> Conceitos de POO Implementados</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6><i class="fas fa-star"></i> Encapsulamento</h6>
                            <p class="small text-muted">
                                Métodos privados/públicos e propriedades protegidas no Character, Item e Quest models.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6><i class="fas fa-star"></i> Herança</h6>
                            <p class="small text-muted">
                                Modelos herdam de Model (Eloquent), controllers herdam de Controller base.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6><i class="fas fa-star"></i> Polimorfismo</h6>
                            <p class="small text-muted">
                                Métodos como getTotalStats(), getRarityLabel() implementam comportamentos específicos.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6><i class="fas fa-star"></i> Relacionamentos</h6>
                            <p class="small text-muted">
                                hasMany, belongsToMany com pivot tables (character_item, character_quest).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
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
