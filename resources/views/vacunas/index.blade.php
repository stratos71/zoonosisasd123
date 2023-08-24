@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Administrar Vacunas</div>
                <!--FORMULARIO CREAR VACUNACIÓN-->
                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('crear_vacuna') }}" onsubmit="bloquear()">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>Datos del Propietario </h2>
                                <hr>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b>Nombre(s)
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control" name="nombres">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b>Apellido Paterno
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control"
                                        name="apellido_paterno">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b>Apellido Materno (opcional)
                                        </b></label>
                                    <input maxlength="100" type="text" class="form-control" name="apellido_materno">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Fecha de Nacimiento
                                        </b></label>
                                    <input required value="2000-01-01" min="1923-01-01" max="2024-01-01" type="date"
                                        class="form-control" name="fecha_nacimiento">
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-8">
                                        <label for="recipient-name" class="col-form-label"><b> C.I.
                                            </b></label>
                                        <input required min="100000" max="99999999" type="number" class="form-control"
                                            name="ci">
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
                                    <label for="recipient-name" class="col-form-label"><b> Complemento
                                        </b></label>
                                    <input required maxlength="10" type="text" class="form-control" name="complemento">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Direccion
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control" name="direccion">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Distrito
                                        </b></label>
                                    <select required class="form-control" name="distrito">
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="5">10</option>
                                        <option value="6">11</option>
                                        <option value="7">12</option>
                                        <option value="8">13</option>
                                        <option value="9">14</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> N° de Domicilio
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control"
                                        name="nro_domicilio">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Correo Electronico (opcional)
                                        </b></label>
                                    <input maxlength="100" type="email" class="form-control" name="correo">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Celular
                                        </b></label>
                                    <input required min="10000000" max="99999999" type="number" class="form-control"
                                        name="celular">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2>Datos del Animal </h2>
                                <hr>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Especie
                                        </b></label>
                                    <select required name="especie_id" class="form-control">
                                        @foreach ($especies as $especie)
                                            <option selected value="{{ $especie->id }}"> {{ $especie->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Nombre
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control" name="nombre">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Raza
                                        </b></label>
                                    <select required class="form-control" name="raza">
                                        <option selected value="Mestizo">Mestizo</option>
                                        <option value="Otro">Otro</option>
                                        <!-- Razas de Perros -->
                                        <option value="Labrador Retriever">Labrador Retriever</option>
                                        <option value="Golden Retriever">Golden Retriever</option>
                                        <option value="Siberian Husky">Siberian Husky</option>
                                        <option value="Rottweiler">Rottweiler</option>
                                        <option value="Dachshund">Dachshund</option>
                                        <option value="Cocker Spaniel">Cocker Spaniel</option>
                                        <option value="Poodle">Poodle</option>
                                        <option value="Bulldog">Bulldog</option>
                                        <!-- Razas de Gatos -->
                                        <option value="Persa">Persa</option>
                                        <option value="Siames">Siames</option>
                                        <option value="Maine Coon">Maine Coon</option>
                                        <option value="Ragdoll">Ragdoll</option>
                                        <option value="Sphynx">Sphynx</option>
                                        <option value="British Shorthair">British Shorthair</option>
                                        <option value="Angora">Angora</option>
                                        <option value="American Shorthair">American Shorthair</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Edad
                                        </b></label>
                                    <input required type="number" class="form-control" name="edad">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Color
                                        </b></label>
                                    <input required maxlength="100" type="text" class="form-control" name="color">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Tamaño
                                        </b></label>
                                    <select required class="form-control" name="tamaño">
                                        <option selected value="Pequeño">Pequeño</option>
                                        <option selected value="Mediano">Mediano</option>
                                        <option selected value="Grande">Grande</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Genero
                                        </b></label>
                                    <select class="form-control" required name="genero">
                                        <option selected value="MACHO">Macho</option>
                                        <option value="HEMBRA">Hembra</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Esterilizado
                                        </b></label>
                                    <select class="form-control" required name="esterilizado">
                                        <option selected value="NO">No</option>
                                        <option value="SI">SI</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Fecha de Vacunacion
                                        </b></label>
                                    <input required readonly type="date" class="form-control" name="fecha_vacuna"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label"><b> Nombre del Vacunador
                                        </b></label>
                                    <input required maxlength="100" readonly type="text" class="form-control"
                                        name="vacunador" value="{{ $user->nombre_completo }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                                aria-label="Close">Salir</button>
                            <button id="boton" class="btn btn-info" type="submit">Guardar
                                Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!--BLOQUEO DEL BOTON-->
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
@endsection
