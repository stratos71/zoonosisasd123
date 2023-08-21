@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Administrar Usuarios</div>

                <div class="card-body">

                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#crear_usuario">Agregar Usuario</button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--MODAL AGREGAR USUARIO-->
                    <div class="modal fade" id="crear_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Agregar Usuario</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form" method="POST" action="{{ route('crear_usuario') }}"
                                    enctype="multipart/form-data" onsubmit="bloquear()">

                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre
                                                    Completo</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre_completo">
                                        </div>
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre de
                                                    Usuario</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre_usuario">
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Ingresar
                                                    Contraseña</b></label>
                                            <input required minlength="4" maxlength="100" type="password"
                                                class="form-control" name="password">
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mb-2">
                                                    <label for="message-text" class="col-form-label"><b>Carnet de
                                                            Identidad</b></label>
                                                    <input required min="100000" max="999999999" type="number"
                                                        class="form-control" name="ci">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-2">
                                                    <label for="message-text" class="col-form-label"><b>Expedido</b></label>
                                                    <select required class="form-control" name="exp">
                                                        <option value="LP">LP</option>
                                                        <option value="OR">OR</option>
                                                        <option value="PT">PT</option>
                                                        <option value="CB">CB</option>
                                                        <option value="CH">CH</option>
                                                        <option value="TJ">TJ</option>
                                                        <option value="PD">PD</option>
                                                        <option value="BN">BN</option>
                                                        <option value="SC">SC</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Rol</b></label>
                                            <select required class="form-control" name="rol">
                                                <option selected disabled value=""> --Seleccione--</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Subir Foto</b></label>
                                            <br>
                                            <input id="file-input" type="file" accept="image/*" name="foto">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton" class="btn btn-info" type="submit">Guardar
                                            Usuario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL AGREGAR USUARIO-->


                    <!--MODAL EDITAR USUARIO-->
                    <div class="modal fade" id="editar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog mt-5" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                                    <h4 class="modal-title text-black">Editar Usuario</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="form2" method="POST" enctype="multipart/form-data"
                                    onsubmit="bloquear2()">

                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre
                                                    Completo</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre_completo">
                                        </div>
                                        <div class="mb-2">
                                            <label for="recipient-name" class="col-form-label"><b>Nombre de
                                                    Usuario</b></label>
                                            <input required maxlength="100" type="text" class="form-control"
                                                name="nombre_usuario">
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Ingresar
                                                    Contraseña (solo si desea cambiar la contraseña actual)</b></label>
                                            <input minlength="4" maxlength="100" type="password" class="form-control"
                                                name="password">
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mb-2">
                                                    <label for="message-text" class="col-form-label"><b>Carnet de
                                                            Identidad</b></label>
                                                    <input required min="100000" max="999999999" type="number"
                                                        class="form-control" name="ci">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-2">
                                                    <label for="message-text"
                                                        class="col-form-label"><b>Expedido</b></label>
                                                    <select required class="form-control" name="exp">
                                                        <option value="LP">LP</option>
                                                        <option value="OR">OR</option>
                                                        <option value="PT">PT</option>
                                                        <option value="CB">CB</option>
                                                        <option value="CH">CH</option>
                                                        <option value="TJ">TJ</option>
                                                        <option value="PD">PD</option>
                                                        <option value="BN">BN</option>
                                                        <option value="SC">SC</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Rol</b></label>
                                            <select required class="form-control" name="rol">
                                                <option selected disabled value=""> --Seleccione--</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Estado</b></label>
                                            <select required class="form-control" name="estado">
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="message-text" class="col-form-label"><b>Subir Foto (solo si desea
                                                    cambiar la foto actual )</b></label>
                                            <br>
                                            <input id="file-input" type="file" accept="image/*" name="foto">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                            aria-label="Close">Salir</button>
                                        <button id="boton2" class="btn btn-info" type="submit">Guardar
                                            Usuario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--MODAL EDITAR USUARIO-->


                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Foto</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->nombre_completo }}</td>
                                        <td>{{ $usuario->nombre_usuario }}</td>
                                        <td>
                                            @if ($usuario->foto)
                                                <img width="50px" height="50px" style="object-fit: cover"
                                                    src="{{ asset($usuario->foto) }}">
                                            @else
                                                <img width="50px" src="{{ asset('img/foto_default.webp') }}">
                                            @endif
                                        </td>
                                        <td>{{ $usuario->roles->first()->name }}</td>
                                        <td>
                                            @if ($usuario->estado == 'Activo')
                                                <h5><span
                                                        class="badge bg-success text-white">{{ $usuario->estado }}</span>
                                                </h5>
                                            @else
                                                <h5><span class="badge bg-danger text-white">{{ $usuario->estado }}</span>
                                                </h5>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm userUpdate"
                                                data-usuario="{{ $usuario->toJson() }}"
                                                data-rol="{{ $usuario->roles->first() }}"
                                                data-url="{{ route('editar_usuario', $usuario->id) }}"
                                                data-bs-toggle="modal" data-bs-target="#editar_usuario"><i
                                                    class="bi bi-pencil-fill text-white"></i>
                                            </a>
                                            <form action="{{ route('eliminar_usuario', $usuario->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');"><i
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
    <script>
        $(document).ready(function() {
            $('.userUpdate').on('click', function() {
                // Obtener el objeto usuario del data-attribute y parsearlo
                var usuario = JSON.parse($(this).attr('data-usuario'));
                var rol = JSON.parse($(this).attr('data-rol'));
                console.log(usuario)
                // Colocar valores en el modal
                $('#editar_usuario input[name="nombre_completo"]').val(usuario.nombre_completo);
                $('#editar_usuario input[name="nombre_usuario"]').val(usuario.nombre_usuario);
                $('#editar_usuario input[name="ci"]').val(usuario.ci);
                $('#editar_usuario select[name="exp"]').val(usuario.exp).trigger('change');
                $('#editar_usuario select[name="estado"]').val(usuario.estado).trigger('change');

                $('#editar_usuario select[name="rol"]').val(rol.id).trigger('change');
                var url = $(this).data('url');
                $('#editar_usuario form').attr('action', url);
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
@endsection
