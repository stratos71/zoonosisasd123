@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Administrar Vacunaciones</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Acción</th>
                                    <th>ID</th>
                                    <th>Nro carnet</th>
                                    <th>Vacunador</th>
                                    <th>Propietario(a)</th>
                                    <th>Dirección</th>
                                    <th>Distrito</th>
                                    <th>Nro Dom</th>
                                    <th>Teléfono</th>

                                    <th>Nombre del animal</th>
                                    <th>Especie</th>
                                    <th>Raza</th>
                                    <th>Edad</th>
                                    <th>Color</th>
                                    <th>Tamaño</th>
                                    <th>Genero</th>
                                    <th>Esterilizado</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacunas as $vacuna)
                                    <tr>
                                        <td>
                                            <a href="{{ route('carnet_vacuna_pdf', $vacuna->id) }}" target="_blank"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-printer-fill text-white"></i>
                                            </a>
                                        </td>
                                        <td>{{ $vacuna->id }}</td>
                                        <td>{{ $vacuna->nro_carnet }}</td>
                                        <td>{{ $vacuna->usuario->nombre_completo }}</td>
                                        <td>{{ $vacuna->animal->propietario->nombres }}</td>
                                        <td>{{ $vacuna->animal->propietario->direccion }}</td>
                                        <td>{{ $vacuna->animal->propietario->distrito }}</td>
                                        <td>{{ $vacuna->animal->propietario->nro_domicilio }}</td>
                                        <td>{{ $vacuna->animal->propietario->celular }}</td>

                                        <td>{{ $vacuna->animal->nombre }}</td>
                                        <td>{{ $vacuna->animal->especie->nombre }}</td>
                                        <td>{{ $vacuna->animal->raza }}</td>
                                        <td>{{ $vacuna->animal->edad }}</td>
                                        <td>{{ $vacuna->animal->color }}</td>
                                        <td>{{ $vacuna->animal->tamaño }}</td>
                                        <td>{{ $vacuna->animal->genero }}</td>
                                        <td>{{ $vacuna->animal->esterilizado }}</td>
                                        <td>
                                            <h5><span class="badge bg-success text-white">{{ $vacuna->estado }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--INICIALIZACIÓN DE DATATABLE-->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                order: [],
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:first-child)'
                        }
                    }
                ],
                responsive: true,
                language: {
                    processing: "Procesando...",
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando registros del _START_ al _END_ <br> de un total de _TOTAL_ registros",
                    infoEmpty: "Mostrando registros del 0 al 0 <br> de un total de 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron resultados",
                    emptyTable: "Ningún dato disponible en esta tabla",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Último"
                    },
                    aria: {
                        sortAscending: ": Activar para ordenar la columna de manera ascendente",
                        sortDescending: ": Activar para ordenar la columna de manera descendente"
                    },
                    buttons: {
                        copy: "Copiar",
                        colvis: "Visibilidad"
                    }
                }
            });
        });
    </script>
@endsection
