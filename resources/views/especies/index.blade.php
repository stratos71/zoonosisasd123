@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Administrar Especies</div>

                <div class="card-body">

                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#crear_especie">Agregar
                        Especie</button>

                    <!--MODAL AGREGAR ESPECIE-->
                    <div class="modal fade" id="crear_especie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Agregar Especie</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form" method="POST" action="{{ route('crear_especie') }}"
                                    onsubmit="bloquear()">

                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre
                                                    de la Especie</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre">
                                        </div>
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Descripción</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="descripcion">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton" class="btn btn-info" type="submit">Guardar Especie</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL AGREGAR ESPECIE-->

                    <!--MODAL EDITAR ESPECIE-->
                    <div class="modal fade" id="editar_especie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Editar Especie</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form2" method="POST" onsubmit="bloquear2()">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre
                                                    de la Especie</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre">
                                        </div>
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Descripción</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="descripcion">
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Estado</b></label>
                                            <select required class="form-control" name="estado">
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton2" class="btn btn-info" type="submit">Guardar
                                            Especie</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL EDITAR ESPECIE-->

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especies as $especie)
                                    <tr>
                                        <td>{{ $especie->id }}</td>
                                        <td>{{ $especie->nombre }}</td>
                                        <td>{{ $especie->descripcion }}</td>

                                        <td>
                                            @if ($especie->estado == 'Activo')
                                                <h5><span class="badge bg-success text-white">{{ $especie->estado }}</span>
                                                </h5>
                                            @else
                                                <h5><span class="badge bg-danger text-white">{{ $especie->estado }}</span>
                                                </h5>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm especieUpdate"
                                                data-especie="{{ $especie->toJson() }}"
                                                data-url="{{ route('editar_especie', $especie->id) }}"
                                                data-bs-toggle="modal" data-bs-target="#editar_especie"><i
                                                    class="bi bi-pencil-fill text-white"></i>
                                            </a>
                                            <form action="{{ route('eliminar_especie', $especie->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que quieres eliminar esta especie?');"><i
                                                        class="bi bi-trash-fill text-white"></i></button>
                                            </form>
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


    <script>
        $(document).ready(function() {
            $('.especieUpdate').on('click', function() {
                var especie = JSON.parse($(this).attr('data-especie'));
                $('#editar_especie input[name="nombre"]').val(especie.nombre);
                $('#editar_especie input[name="descripcion"]').val(especie.descripcion);
                $('#editar_especie select[name="estado"]').val(especie.estado).trigger('change');
                var url = $(this).data('url');
                $('#editar_especie form').attr('action', url);
            });
        });
    </script>

    <script>
        function bloquear() {
            var btn = document.getElementById("boton");
            var form = document.getElementById("form");
            var campos = form.elements;
            for (var i = 0; i < campos.length; i++) {
                campos[i].readOnly = true;
            }
            btn.disabled = true;
        }
    </script>

    <script>
        function bloquear2() {
            var btn = document.getElementById("boton2");
            var form = document.getElementById("form2");
            var campos = form.elements;
            for (var i = 0; i < campos.length; i++) {
                campos[i].readOnly = true;
            }
            btn.disabled = true;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                order: [],
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
