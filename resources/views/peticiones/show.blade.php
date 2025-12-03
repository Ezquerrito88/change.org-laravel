@extends('layouts.public')

@section('content')

    <main class="container">
        <section>
            <h1 class="fw-bold mt-5">{{ $petition->title }}</h1>

            <div class="container mt-4 px-0">
                <div class="row">

                    <div class="col-12 col-lg-7">

                        @if($petition->image)
                            <img src="{{ asset('petitions/' . $petition->image) }}"
                                 class="img-fluid rounded-3 mb-4 col-12"
                                 alt="{{ $petition->title }}"
                                 style="max-height: 450px; width: 100%; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/800x450?text=Sin+Imagen"
                                 class="img-fluid rounded-3 mb-4 col-12" alt="Sin imagen">
                        @endif

                        <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                            <i class="bi bi-person-circle fs-2 text-secondary me-3"></i>
                            <div>
                                <p class="m-0 text-secondary small">Petición dirigida a</p>
                                <h5 class="fw-bold m-0">{{ $petition->recipient }}</h5>
                            </div>
                        </div>

                        <h2 class="fw-bold fs-1">La historia</h2>

                        <div style="white-space: pre-line;" class="fw-normal text-break">
                            {{ $petition->description }}
                        </div>

                        <div class="mt-4 mb-5">
                            <a href="#" class="text-secondary text-decoration-none small">
                                <i class="bi bi-flag me-1"></i>
                                <span class="text-decoration-underline">Denunciar una violación de políticas</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="sticky-top shadow rounded-3 pt-3 bg-white" style="top: 20px; z-index: 10;">

                            <div class="text-center">
                                <h2 class="fw-bold fs-1 pt-4">{{ $petition->signers }}</h2>
                                <p class="fw-normal text-secondary">
                                    <i class="bi bi-pen me-1"></i> Personas han firmado
                                </p>

                                <div class="progress mx-4 mb-3" style="height: 10px;">
                                    @php $percent = $petition->signers > 0 ? ($petition->signers % 100) + 10 : 5; @endphp
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percent }}%"></div>
                                </div>
                            </div>

                            <div class="border-top mx-3 p-3">
                                <h3 class="fw-bold fs-4 mb-3">Firma esta petición</h3>

                                <form>
                                    <div class="mb-3">
                                        <label class="form-label fw-normal">Nombre</label>
                                        <input type="text" class="form-control"
                                               value="{{ Auth::check() ? Auth::user()->name : '' }}"
                                            {{ Auth::check() ? 'disabled' : 'placeholder="Tu nombre"' }}>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-normal">Email</label>
                                        <input type="email" class="form-control"
                                               value="{{ Auth::check() ? Auth::user()->email : '' }}"
                                            {{ Auth::check() ? 'disabled' : 'placeholder="Tu email"' }}>
                                    </div>

                                    <button type="button" class="btn btn-warning w-100 fw-bold py-2 btn-yellow">
                                        Firma la petición
                                    </button>

                                    <p class="small text-muted mt-3">
                                        Al firmar, aceptas nuestros términos de servicio y política de privacidad.
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="mt-5 pt-5 border-top">
            <h2 class="fw-bold fs-2 mb-3">Peticiones similares</h2>
            <p class="text-secondary">Otras personas también están firmando esto...</p>
        </section>

    </main>

@endsection
