@extends('layouts.app')

@section('content')
    <!--ESTADISTICAS DEL SISTEMA-->
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-1">
                    <div class="card text-white bg-warning">
                        <div class="card-body pb-0 card-warning">
                            <div>
                                <h3>{{ $usuarios }}</h3>
                            </div>
                            <div class="text-value-lg mb-2">Usuarios</div>
                        </div>
                        <div class="card-body pb-0" style="background-color: #9b6b05">
                            <h5 class="text-center">Más info</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-1">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0 card-info">
                            <div>
                                <h3>{{ $vacunas }}</h3>
                            </div>
                            <div class="text-value-lg mb-2">Registros de vacunación</div>
                        </div>
                        <div class="card-body pb-0" style="background-color: #155ca3">
                            <h5 class="text-center">Más info</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-1">
                    <div class="card text-white bg-success">
                        <div class="card-body pb-0 card-success">
                            <div>
                                <h3>53%</h3>
                            </div>
                            <div class="text-value-lg mb-2">Enfermedades</div>
                        </div>
                        <div class="card-body pb-0" style="background-color: #0e8335">
                            <h5 class="text-center">Más info</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-1">
                    <div class="card text-white bg-danger">
                        <div class="card-body pb-0 card-danger">
                            <div>
                                <h3>65</h3>
                            </div>
                            <div class="text-value-lg mb-2">Mordeduras</div>
                        </div>
                        <div class="card-body pb-0" style="background-color: #a12020">
                            <h5 class="text-center">Más info</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
