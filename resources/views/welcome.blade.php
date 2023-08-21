@extends('layouts.guest')


@section('content')
    <div class="container-fluid" style="margin-top: 180px">
        <div class="row">
            <nav class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="/">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#link2">CONSULTA CARNET</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#link3">REGISTRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#link4">MI CIUDAD</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="#link5">CAMPAÑAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="m-1 btn btn-info" href="/ingresar">INICIAR SESIÓN</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-3">
            <img src="https://scontent.flpb1-2.fna.fbcdn.net/v/t39.30808-6/275777263_138088872063777_3644364205981698978_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=e3f864&_nc_ohc=vru-Z1bzlyEAX8DcXf5&_nc_ht=scontent.flpb1-2.fna&oh=00_AfA0ANtdF0mk5V1j9ROn0K9Tqm2B2gmQXG_sKj5yo9zDMg&oe=64E7C055"
                width="300px" alt="">

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
