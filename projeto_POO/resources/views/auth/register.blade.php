@extends('layouts.app')

@section('title', 'Registrar - Taverna do Aventureiro')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header text-center py-4">
                    <h3 class="mb-0">
                        <i class="fas fa-user-plus"></i> Criar Conta
                    </h3>
                    <p class="text-muted mb-0 small mt-2">Comece sua aventura na Taverna</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i> Nome
                            </label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Seu nome completo"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="seu@email.com"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i> Senha
                            </label>
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Mínimo 6 caracteres"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="text-muted d-block mt-1">
                                <i class="fas fa-info-circle"></i> A senha deve ter pelo menos 6 caracteres
                            </small>
                        </div>

                        <!-- Confirmar Senha -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock"></i> Confirmar Senha
                            </label>
                            <input
                                type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Repita sua senha"
                                required
                            >
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botão de Registro -->
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                            <i class="fas fa-user-plus"></i> Registrar
                        </button>

                        <!-- Link para Login -->
                        <div class="text-center">
                            <p class="mb-0">
                                Já tem uma conta?
                                <a href="{{ route('login') }}" class="text-warning fw-bold">
                                    Faça login!
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Termos -->
            <div class="alert alert-info mt-4" role="alert">
                <i class="fas fa-scroll"></i>
                <strong>Aviso:</strong> Ao registrar, você concorda com nossos <strong>Termos de Serviço</strong>
            </div>
        </div>
    </div>
@endsection
