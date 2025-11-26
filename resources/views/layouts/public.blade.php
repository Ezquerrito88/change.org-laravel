<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change.org Clone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-brand-custom" href="{{ route('home') }}">change.org</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><b>Mis peticiones</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><b>Programa de socio/as</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('peticiones.index') }}">
                        <b><i class="bi bi-search me-1"></i> Buscar</b>
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('peticiones.create') }}" class="btn btn-outline-custom">
                    Inicia una petición
                </a>

                @auth
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=fff"
                                 alt="{{ Auth::user()->name }}" width="40" height="40" class="rounded-circle border">
                        </a>

                        <ul class="dropdown-menu text-small dropdown-menu-end shadow" aria-labelledby="dropdownUser1">
                            <li class="px-3 py-2 bg-light border-bottom mb-2">
                                <span class="fw-bold text-muted small">Hola, {{ Auth::user()->name }}</span>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Ir a mi Dashboard
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mi Perfil</a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-bold">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                @else
                    <a href="{{ route('login') }}" class="nav-link text-dark fw-bold">Entrar</a>
                    <a href="{{ route('register') }}" class="btn btn-danger fw-bold text-white">Registrarse</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

@yield('content')


<footer class="pt-5 pb-3 border-top mt-5">
    <div class="container">
        <div class="row mb-5 border-bottom">
            <div class="col-6 col-md-3">
                <h5 class="fw-bold mb-3 text-dark">Acerca de</h5>
                <ul class="list-unstyled fw-normal">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Sobre TuCausa.org</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Impacto</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Empleo</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Equipo</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <h5 class="fw-bold mb-3 text-dark">Comunidad</h5>
                <ul class="list-unstyled fw-normal">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Prensa</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Normas de la Comunidad</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mt-4 mt-md-0">
                <h5 class="fw-bold mb-3 text-dark">Ayuda</h5>
                <ul class="list-unstyled fw-normal">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Ayuda</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Guías</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Privacidad</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mt-4 mt-md-0">
                <h5 class="fw-bold mb-3 text-dark">Redes sociales</h5>
                <ul class="list-unstyled fw-normal">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">X</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Facebook</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="text-secondary small mb-3 mb-md-0">
            <p class="mb-1 text-dark">© 2025, TuCausa.org, PBC</p>
            <p class="fw-normal">Esta web está protegida por reCAPTCHA.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
