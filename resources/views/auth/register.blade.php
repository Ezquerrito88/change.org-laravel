@extends('layouts.public')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-4">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Únete a Change.org</h3>
                        <p class="text-secondary">Crea una cuenta gratuita</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nombre completo</label>
                            <input id="name" type="text" name="name" class="form-control form-control-lg"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Correo electrónico</label>
                            <input id="email" type="email" name="email" class="form-control form-control-lg"
                                   value="{{ old('email') }}" required>
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Contraseña</label>
                            <input id="password" type="password" name="password" class="form-control form-control-lg"
                                   required autocomplete="new-password">
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmar contraseña</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-control form-control-lg" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-danger btn-lg fw-bold">
                                Crear cuenta
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">¿Ya tienes cuenta?
                                <a href="{{ route('login') }}" class="text-danger fw-bold text-decoration-none">Inicia sesión</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
