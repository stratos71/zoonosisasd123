@extends('layouts.guest')

@section('content')
    <!--Validación de autenticación -->
    @php
        if (Auth::check()) {
            header('Location: /inicio');
            exit();
        }
    @endphp
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row justify-content-center">
            <div class="col" style="max-width: 500px">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">INICIA SESIÓN PARA ACCEDER</h5>
                            <!-- Formulario de inicio de sesión-->
                            <form method="POST" action="{{ route('iniciar_sesion') }}">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-10 input-group mb-3 mt-4">
                                        <input maxlength="100" class="form-control" type="text"
                                            placeholder="Nombre de usuario" name="nombre_usuario" required autofocus>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="bi bi-person-fill"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-10 input-group mb-3 mt-4">
                                        <input class="form-control" type="password" placeholder="Constraseña"
                                            name="password" maxlength="100" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="bi bi-lock-fill"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6 text-center">
                                        <a href="/" class="btn btn-danger">Volver al inicio</a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <button class="btn btn-success px-4" type="submit">
                                            <i class="cil-shield-check"></i> Ingresar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
