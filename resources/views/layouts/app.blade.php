<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BeliKatsu') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #fffdfa;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.4s ease-in;
        }

        main {
            flex: 1;
        }

        .navbar {
            background-color: #ff8c42;
            transition: background-color 0.3s ease;
        }

        .navbar-brand, .nav-link, .dropdown-toggle {
            color: #fff !important;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .nav-link:hover, .dropdown-item:hover {
            color: #fcd5b5 !important;
        }

        .dropdown-menu {
            border-radius: 8px;
            animation: fadeIn 0.3s ease-in-out;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .btn-primary {
            background-color: #f2542d;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #d63e1d;
        }

        footer {
            background-color: #ff8c42;
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: 500;
            font-size: 14px;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    🍱 BeliKatsu
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('keranjang.index') }}">Keranjang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('checkout.riwayat') }}">Riwayat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="https://wa.me/6281234567890" target="_blank">
                                    📞 Kontak Admin
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    👤 {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            🔓 Logout
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer>
            &copy; {{ date('Y') }} BeliKatsu 🍱 | Simple Laravel App
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
