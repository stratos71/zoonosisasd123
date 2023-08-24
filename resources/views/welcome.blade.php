@extends('layouts.guest')

<!--VISTA DE BIENVENIDA (USUARIOS NO LOGUEADOS)-->
@section('content')
    <div class="container-fluid" style="margin-top: 180px">
        <div class="row">
            <nav class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="/">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#">CONSULTA CARNET</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#">REGISTRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#">MI CIUDAD</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#">CAMPAÑAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="/ingresar">INICIAR SESIÓN</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-3">
            <img src="/img/zoonosis.jpg" width="300px" alt="">
            <div class="d-flex justify-content-center">
                <div class="mt-3"
                    style="max-width: 600px;background-color: #ffffff98; border: solid 2px black; padding: 15px;">
                    <h5 style="color: black">
                        El Área de Zoonosos dependiente de Dirección de Gestión en salud - Secretaria Municipal de Salud, es
                        de
                        cortar el ciclo de transmisión del virus de la Rabia, dicha enfermedad es de origen Zoonótico, cuyo
                        reservorio principal es el perro doméstico pese que todos los animales mamíferos son susceptibles en
                        nuestro Municipio.
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
