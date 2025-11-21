@extends('layouts.public')

@section('content')
    <section class="container my-5 py-5">
        <div class="row">
            <div class="col-lg-8 col-xl-7 mx-auto text-center">
                <h1 class="fw-bold display-5" style="color: #403a49;">Descubre tu próxima causa</h1>
                <p class="fs-5 text-secondary mb-4">Explora millones de peticiones y encuentra las que te interesan</p>
                <form action="{{ route('peticiones.index') }}" method="GET">
                    <div class="input-group input-group-lg shadow-sm">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-secondary"></i>
                        </span>
                        <input type="text" name="q" class="form-control border-start-0" placeholder="Buscar peticiones">
                        <button class="btn btn-warning-custom fw-bold px-4" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-10 mx-auto">
                <h4 class="fw-bold mb-3">Explorar</h4>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 card-explore-hover">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-geo-alt-fill fs-1 text-warning-custom"></i>
                                <h5 class="card-title fw-bold mt-3">Cerca de ti</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="container my-5">
            <h2 class="fw-bold mb-4">Peticiones destacadas</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="https://assets.change.org/photos/6/uf/zt/sGuFZtLrKpRsFcx-800x450-noPad.jpg?1762004291" class="card-img-top" alt="Imagen Petición">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Por una justicia más rápida</h5>
                            <a href="{{ route('peticiones.show', ['id' => 1]) }}" class="btn btn-outline-dark mt-auto">Ver petición</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
