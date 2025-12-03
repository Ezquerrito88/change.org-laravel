@extends('layouts.public')

@section('content')
    <section class="container my-5 py-5">
        <div class="row">
            <div class="col-lg-8 col-xl-7 mx-auto text-center">
                <h1 class="fw-bold display-5" style="color: #403a49;">Descubre tu próxima causa</h1>
                <p class="fs-5 text-secondary mb-4">Explora millones de peticiones y encuentra las que te interesan</p>
                <form action="{{ route('petitions.index') }}" method="GET">
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
            <h2 class="fw-bold mb-4">Listado de Peticiones</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                @forelse ($petitions as $petition)
                    <?php var_dump($petition->files); ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div style="height: 200px; overflow: hidden;">
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-truncate" title="{{ $petition->title }}">
                                    {{ $petition->title }}
                                </h5>

                                <p class="small text-muted mb-2">
                                    <i class="bi bi-pen-fill text-danger"></i> {{ $petition->signers }} firmas
                                </p>

                                <a href="{{ route('petitions.show', $petition->id) }}" class="btn btn-outline-danger mt-auto fw-bold">
                                    Ver petición
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center p-5">
                            <h4>No tienes ninguna petición creada todavía.</h4>
                            <p>¡Sé el primero en iniciar el cambio!</p>
                            <a href="{{ route('petitions.create') }}" class="btn btn-warning fw-bold mt-2">Inicia una petición</a>
                        </div>
                    </div>
                @endforelse

            </div>

            <div class="d-flex justify-content-center mt-5">
                @if($petitions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $petitions->links() }}
                @endif
            </div>

        </section>
    </section>
@endsection
