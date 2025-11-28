@extends('layouts.public')

@section('content')
    <main class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1 class="fw-bold display-5 text-center" style="color: #403a49;">Inicia tu petición</h1>
                <p class="fs-4 text-center text-muted mb-4">Empieza un movimiento que logre un cambio.</p>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('petitions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="form-label fs-5 fw-bold">¿Cuál es el título de tu petición?</label>
                                <input type="text" name="title" class="form-control form-control-lg" id="title" placeholder="Ej: ¡Ley de Acoso Escolar YA!" required>
                            </div>

                            <div class="mb-4">
                                <label for="recipient" class="form-label fs-5 fw-bold">¿A quién se la pides?</label>
                                <input type="text" name="recipient" class="form-control form-control-lg" id="recipient" placeholder="Ej: Ministerio de Educación" required>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fs-5 fw-bold">Explica el problema que quieres solucionar</label>
                                <textarea name="description" class="form-control form-control-lg" id="description" rows="8" placeholder="Explica la historia y por qué es importante..." required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="category_id" class="form-label fs-5 fw-bold">Categoría</label>
                                <select name="category_id" class="form-select form-select-lg" required>
                                    <option value="" selected disabled>Selecciona una categoría</option>
                                    @foreach($categorias as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="file" class="form-label fs-5 fw-bold">Añade una imagen</label>
                                <input class="form-control form-control-lg" type="file" name="file" id="file" required>
                                <div class="form-text">Las peticiones con imagen tienen más éxito.</div>
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-warning btn-lg fw-bold p-3">Crear mi petición</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
