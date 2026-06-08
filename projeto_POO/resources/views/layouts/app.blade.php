<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RPG - Taverna do Aventureiro')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #8b4513;
            --secondary-color: #d2691e;
            --dark-bg: #2c2c2c;
            --light-text: #f5f5f5;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--light-text);
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: var(--light-text) !important;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .card {
            background-color: #3a3a3a;
            border-color: var(--primary-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: var(--primary-color);
            border-bottom-color: var(--secondary-color);
        }

        .form-control {
            background-color: #4a4a4a;
            color: var(--light-text);
            border-color: var(--primary-color);
        }

        .form-control:focus {
            background-color: #555;
            color: var(--light-text);
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(210, 105, 30, 0.25);
        }

        .form-control::placeholder {
            color: #999;
        }

        .alert {
            border-radius: 4px;
            border-left: 4px solid;
        }

        .alert-success {
            background-color: #2d5f2d;
            border-left-color: #4caf50;
            color: #90ee90;
        }

        .alert-danger {
            background-color: #5f2d2d;
            border-left-color: #f44336;
            color: #ff9999;
        }

        footer {
            background-color: var(--primary-color);
            border-top: 2px solid var(--secondary-color);
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        html, body {
            height: 100%;
        }

        .container-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>

    @yield('extra-css')
</head>
<body>
    <div class="container-wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-dungeon"></i> Taverna do Aventureiro
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">
                                    <i class="fas fa-home"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus"></i> Registrar
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <div class="container my-4">
                <!-- Mensagens de Sucesso/Erro -->
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> Ocorreram erros na validação:
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <p class="mb-0">&copy; 2026 Taverna do Aventureiro - RPG em POO com Laravel</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
