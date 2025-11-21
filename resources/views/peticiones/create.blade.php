@extends('layouts.public')

@section('content')
    <main class="container my-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1 class="fw-bold display-5 text-center" style="color: #403a49;">Inicia tu petición</h1>
                <p class="fs-4 text-center text-muted mb-4">Empieza un movimiento que logre un cambio.</p>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('peticiones.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf <div class="mb-4">
                                <label for="titulo" class="form-label fs-5 fw-bold">¿Cuál es el título de tu petición?</label>
                                <input type="text" name="titulo" class="form-control form-control-lg" id="titulo" placeholder="Ej: ¡Ley de Acoso Escolar YA!" required>
                            </div>

                            <div class="mb-4">
                                <label for="destinatario" class="form-label fs-5 fw-bold">¿A quién se la pides?</label>
                                <input type="text" name="destinatario" class="form-control form-control-lg" id="destinatario" placeholder="Ej: Ministerio de Educación" required>
                            </div>

                            <div class="mb-4">
                                <label for="descripcion" class="form-label fs-5 fw-bold">Explica el problema que quieres solucionar</label>
                                <textarea name="descripcion" class="form-control form-control-lg" id="descripcion" rows="8" required></textarea>
                            </div>

                            <input type="hidden" name="categoria_id" value="1">

                            <div class="mb-4">
                                <label for="file" class="form-label fs-5 fw-bold">Añade una imagen</label>
                                <input class="form-control form-control-lg" type="file" name="file" id="file">
                            </div>

                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-yellow btn-lg fw-bold p-3">Crear mi petición</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
