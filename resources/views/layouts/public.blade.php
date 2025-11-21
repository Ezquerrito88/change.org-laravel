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

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
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
                        <b><i class="bi bi-search me-1"></i>Buscar</b>
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a href="{{ route('peticiones.create') }}" class="btn btn-outline-custom me-3">
                    Inicia una petición
                </a>
                <a href="#" class="nav-link text-dark fw-bold">
                    Entrar
                </a>
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
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div class="text-secondary small mb-3 mb-md-0">
                <p class="mb-1 text-dark">© 2025, TuCausa.org, PBC</p>
                <p class="fw-normal">Esta web está protegida por reCAPTCHA.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
