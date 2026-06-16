@extends('layouts.app')

@section('title', 'Taverna do Aventureiro')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-lg-8 text-center">
            <div class="display-1 mb-3">
                <i class="fas fa-dungeon" style="color: #d2691e;"></i>
            </div>
            <p class="text-uppercase text-muted mb-2">RPG em Laravel</p>
            <h1 class="display-4 fw-bold mb-3">Bem-vindo à Taverna do Aventureiro</h1>
            <p class="lead text-muted mb-4">
                Uma base simples para gerenciar personagens, itens e quests.
            </p>

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-play-circle"></i> Acessar dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-user-plus"></i> Criar conta
                </a>
            @endauth
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-user fa-2x text-warning mb-3"></i>
                    <h5 class="card-title">Personagens</h5>
                    <p class="card-text text-muted mb-0">Crie e organize os heróis da sua campanha.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-box-open fa-2x text-danger mb-3"></i>
                    <h5 class="card-title">Itens</h5>
                    <p class="card-text text-muted mb-0">Controle o inventário sem excesso de telas.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <i class="fas fa-scroll fa-2x text-success mb-3"></i>
                    <h5 class="card-title">Quests</h5>
                    <p class="card-text text-muted mb-0">Acompanhe as missões e o progresso do jogo.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
