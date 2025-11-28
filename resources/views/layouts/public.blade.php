@php
    use Illuminate\Support\Facades\Auth;
@endphp
    <!DOCTYPE html>
<html lang="es">
<head>
    <title>Change.org</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light border-bottom sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-danger fs-2 fw-bold" href="{{ route('home') }}">Change.org</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fs-4 m-2" href="{{ route('petitions.index') }}">Más Peticiones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fs-4 m-2 fw-bold text-danger" href="{{ route('petitions.create') }}">Inicia una petición</a>
                </li>

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link fs-4 m-2" href="{{ route('petitions.mine') }}">Mis peticiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 m-2" href="{{ route('petitions.signed') }}">Mis firmas</a>
                    </li>
                @endif
            </ul>

            @if(Auth::check())
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff"
                             class="rounded-circle border" width="40" height="40" alt="Profile">
                        <span class="fw-bold text-dark">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><h6 class="dropdown-header">{{ Auth::user()->email }}</h6></li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mi Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger fw-bold">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="d-flex gap-2">
                    <a class="nav-link fs-5 m-2 link-danger" href="{{ route('register') }}">Registrarse</a>
                    <a class="nav-link fs-5 m-2 link-danger" href="{{ route('login') }}">Entrar</a>
                </div>
            @endif
        </div>
    </div>
</nav>

@yield('content')

<footer class="pt-5 pb-3 border-top mt-5 bg-light text-center">
    <p class="text-muted">© 2025 Change.org Clone</p>
</footer>

</body>
</html>
