@extends('layouts.app')

@section('title', 'Login - Taverna do Aventureiro')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header text-center py-4">
                    <h3 class="mb-0">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </h3>
                    <p class="text-muted mb-0 small mt-2">Acesse sua conta de aventureiro</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

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
                                placeholder="••••••••"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Lembrar-se -->
                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="remember"
                                name="remember"
                            >
                            <label class="form-check-label" for="remember">
                                Lembrar-se de mim
                            </label>
                        </div>

                        <!-- Botão de Login -->
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                            <i class="fas fa-sign-in-alt"></i> Entrar
                        </button>

                        <!-- Link para Registro -->
                        <div class="text-center">
                            <p class="mb-0">
                                Não tem uma conta?
                                <a href="{{ route('register') }}" class="text-warning fw-bold">
                                    Registre-se agora!
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Dica -->
            <div class="alert alert-info mt-4" role="alert">
                <i class="fas fa-info-circle"></i>
                <strong>Demo:</strong> Use as credenciais de teste para explorar o sistema
            </div>
        </div>
    </div>
@endsection
