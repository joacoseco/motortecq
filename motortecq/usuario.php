<?php 
    require_once "assets/templates/header.php";
?>


<link rel="stylesheet" href="assets/css/error.css">
<script src="assets/js/rut.js"></script>
<script src="assets/js/usuario.js"></script>
    <div class="container-fluid">
        <h2>Trabajadores</h2>
        <div class="container">
            <form autocomplete="off">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rutTxt">Rut<span class="errorspan" id="rutSpan">*</span></label>
                            <input id="rutTxt"  value="" placeholder="11111111-1" class="form-control" 
                            onkeypress="return numeros(event,this)" onfocusout="puntosRut(event,this)"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombreTxt">Nombre<span class="errorspan" id="nombreSpan">*</span></label>
                            <input id="nombreTxt" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="aPaternoTxt">Apellido paterno<span class="errorspan" id="aPaternoSpan">*</span></label>
                            <input id="aPaternoTxt" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="aMaternoTxt">Apellido materno<span class="errorspan" id="aMaternoSpan">*</span></label>
                            <input id="aMaternoTxt" value="" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefonoTxt">Telefono<span class="errorspan" id="telefonoSpan">*</span></label>
                            <input id="telefonoTxt" type="number" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="emailTxt">Email<span class="errorspan" id="emailSpan">*</span></label>
                            <input type="email" id="emailTxt" value="" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cargotxt">Cargo <span class="errorspan" id="cargoSpan">*</span></label>
                            <select name="cargotxt" id="cargotxt" class="form-control">
                                <option value="0">Seleccione</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Mecánico">Mecánico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="permisotxt">Permiso <span class="errorspan" id="permisoSpan">*</span></label>
                            <select name="permisotxt" id="permisotxt" class="form-control">
                                <option value="0">Seleccione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Cliente</option>
                                <option value="3">Mecánico</option>
                            </select>
                        </div>
                    </div>
                    <span class="errorspan">La clave sera el rut sin el digito verificador, despues podra modificarla</span>
                    <p id="text" class="errorspan"></p>
                </div>


                <button  class="btn btn-success" id="agregarBtn"> Agregar usuario</button>
                <button  class="btn btn-primary" id="modificarBtn" hidden> Modificar usuario</button>
                <button class="btn btn-danger" id="cancelarBtn">Cancelar</button>
            </form>
        </div>
        <div class="container pt-3">
            <h3>Listado de usuarios</h3>
            <table id="usuarioTabla" class='table table-striped table-bordered table-hover'>
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Permiso</th>
                    <th>Cargo</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody id="bodyTabla">
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Permisos del usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="modalPermiso">Permiso <span class="errorspan" id="permisoSpan">*</span></label>
                        <select name="modalPermiso" id="modalPermiso" class="form-control">
                            <option value="0">Seleccione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Cliente</option>
                            <option value="3">Mecánico</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="modalRut">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="editarPermiso()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "assets/templates/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </body>
</html>

