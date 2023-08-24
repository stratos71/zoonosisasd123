 <!--MODAL CAMBIAR CONTRASEÑA-->
 <div class="modal fade" id="cambiar_contraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <div class="modal-dialog mt-5" role="document">
         <div class="modal-content">
             <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                 <h4 class="modal-title text-black">Cambiar contraseña</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="form" method="POST" action="{{ route('cambiar_contraseña', Auth::user()->id) }}"
                 onsubmit="bloquear()">
                 @csrf
                 <div class="modal-body">
                     <div class="mb-2">
                         <label for="message-text" class="col-form-label"><b>Ingrese su contraseña actual</b></label>
                         <input required minlength="4" maxlength="100" type="password" class="form-control"
                             name="old_password">
                     </div>
                     <div class="mb-2">
                         <label for="message-text" class="col-form-label"><b>Ingrese su nueva contraseña</b></label>
                         <input required minlength="4" maxlength="100" type="password" class="form-control"
                             name="new_password">
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-danger mr-auto" type="button" data-bs-dismiss="modal"
                         aria-label="Close">Salir</button>
                     <button id="boton" class="btn btn-info" type="submit">Guardar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!--MODAL CAMBIAR CONTRASEÑA-->


 <!--MODAL CAMBIAR FOTO-->
 <div class="modal fade" id="cambiar_foto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <div class="modal-dialog mt-5" role="document">
         <div class="modal-content">
             <div class="modal-header" style="background-color: rgb(182, 182, 182)">
                 <h4 class="modal-title text-black">Cambiar foto</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="form2" method="POST" enctype="multipart/form-data"
                 action="{{ route('cambiar_foto', Auth::user()->id) }}" onsubmit="bloquear2()">

                 @csrf
                 <div class="modal-body">
                     <div class="mb-2">
                         <label for="message-text" class="col-form-label"><b>Subir Foto (solo si desea
                                 cambiar la foto actual )</b></label>
                         <br>
                         <input required id="file-input" type="file" accept="image/*" name="foto">
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
 <!--MODAL CAMBIAR FOTO-->


 <header class="header header-sticky mb-4">
     <div class="container-fluid">
         <button class="header-toggler px-md-0 me-md-3" type="button"
             onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
             <svg class="icon icon-lg">
                 <use xlink:href="{{ asset('icons/coreui.svg#cil-menu') }}"></use>
             </svg>
         </button>
         @php
             if (!Auth::check()) {
                 header('Location: /');
                 exit();
             }
         @endphp

         <ul class="header-nav ms-auto">
         </ul>
         <span class="text-dark">
             {{ Auth::user()->nombre_completo }}
         </span>
         <ul class="header-nav ms-3">
             <li class="nav-item dropdown">
                 <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                     aria-haspopup="true" aria-expanded="false">
                     @if (Auth::user()->foto)
                         <div class="avatar"
                             style=" width: 58px; height: 58px; background-image: url('{{ asset(Auth::user()->foto) }}'); background-size: cover; background-position: center center;">
                         </div>
                     @else
                         <div class="avatar"
                             style=" width: 58px; height: 58px; background-image: url('{{ asset('img/foto_default.webp') }}'); background-size: cover; background-position: center center;">
                         </div>
                     @endif
                 </a>
                 <div class="dropdown-menu dropdown-menu-end pt-0">
                     <div>
                         <h6 class="dropdown-header">Ajustes</h6>
                     </div>
                     <a class="dropdown-item" href="#" data-bs-toggle="modal"
                         data-bs-target="#cambiar_contraseña">
                         <i class="bi bi-lock-fill"></i>
                         &nbsp; Cambiar contraseña
                     </a>
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cambiar_foto">

                         <i class="bi bi-camera-fill"></i>
                         &nbsp; Cambiar foto
                     </a>
                     <form method="POST" action="{{ url('/cerrar_sesion') }}">
                         @csrf
                         <button type="submit" class="dropdown-item">
                             <i class="bi bi-box-arrow-left"></i>
                             &nbsp; Cerrar sesión
                         </button>
                     </form>
                 </div>
             </li>
         </ul>
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
     <!--BLOQUEO DEL BOTON-->
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
 </header>
