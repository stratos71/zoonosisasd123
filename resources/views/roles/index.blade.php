@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Administrar Roles</div>

                <div class="card-body">

                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#crear_rol">Agregar
                        Rol</button>

                    <!--MODAL AGREGAR ROL-->
                    <div class="modal fade" id="crear_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Agregar Rol</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form" method="POST" action="{{ route('crear_rol') }}" onsubmit="bloquear()">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre del
                                                    Rol</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre" placeholder="ej: Técnico 1">
                                        </div>

                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Permisos para este
                                                    Rol</b></label>
                                            <div class="row">

                                                @foreach ($permisos as $permiso)
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" name="permisos[]"
                                                                value="{{ $permiso->id }}">
                                                            {{ $permiso->name }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton" class="btn btn-info" type="submit">Guardar Rol</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL AGREGAR ROL-->

                    <!--MODAL EDITAR ROL-->
                    <div class="modal fade" id="editar_rol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Editar Rol</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form2" method="POST" onsubmit="bloquear2()">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre del
                                                    Rol</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre" placeholder="ej: Técnico 1">
                                        </div>

                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Permisos para este
                                                    Rol</b></label>
                                            <div class="row">

                                                @foreach ($permisos as $permiso)
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" name="permisos[]"
                                                                value="{{ $permiso->id }}">
                                                            {{ $permiso->name }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton2" class="btn btn-info" type="submit">Guardar
                                            Rol</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL EDITAR ROL-->


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nombre del Rol</th>
                                    <th>Usuarios con este Rol</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <?php
                                    $contador = 0;
                                    ?>

                                    <tr>
                                        <td class="id">{{ $role->id }}</td>
                                        <td class="name">{{ $role->name }}</td>
                                        <td class="usuarios_asignados">{{ $role->users->count() }}</td>

                                        <td class="text-right">

                                            <a class="btn btn-warning btn-sm rolUpdate" data-rol="{{ $role->toJson() }}"
                                                data-permisos="{{ $role->permissions->toJson() }}"
                                                data-url="{{ route('editar_rol', $role->id) }}" data-bs-toggle="modal"
                                                data-bs-target="#editar_rol"><i class="bi bi-pencil-fill text-white"></i>
                                            </a>


                                            @if ($role->users->count() == 0)
                                                <form action="{{ route('eliminar_rol', $role->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Estás seguro de que quieres eliminar este rol?');"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            @endif
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
            $('.rolUpdate').on('click', function() {
                var rol = JSON.parse($(this).attr('data-rol'));
                var permisos = JSON.parse($(this).attr('data-permisos'));
                $('#editar_rol input[name="nombre"]').val(rol.name);
                $('#editar_rol input[name="permisos[]"]').prop('checked', false);
                $.each(permisos, function(index, permiso) {
                    $('#editar_rol input[name="permisos[]"][value="' + permiso.id + '"]').prop(
                        'checked', true);
                });
                var url = $(this).data('url');
                $('#editar_rol form').attr('action', url);
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
