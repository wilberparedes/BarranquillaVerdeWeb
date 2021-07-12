<?php
  include 'developer/var.php';
?>


<style>
    label{
        font-weight:bold;
    }
    ul{
        margin-left: 15px !important;
    }
    td > a, .table-responsive > a   {
        color: #fff !important  ;
    }
    #addDirection{
        text-decoration: underline;
        cursor: pointer;
    }
    .card-header{
        background-color: #2196f3 !important;
        color: white !important;
    }
    .multiselectSintomas > button, .multiselect > button{
        background: #fff !important;
        color: #495057 !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
    }
    .btn-outline-light{
        color: #fff;
        background-color: transparent;
        background-image: none;
        border-color: #fff;
    }
    .pac-container{
        z-index: 999999999;
    }
 
    .p-20 {
        padding: 20px 0px !important;
    }
</style>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Gestión de usuarios</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Configuración</a></li>
                    <li class="active">Gestión de usuarios</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20 listCasos">
    <div class="col-12  m-t-3">
        <h4 class="text-black">Listado</h4>
        <div class="table-responsive">
            <div style="width: 100%; display:block">
                <button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#mNuevo"><i class="fa fa-plus-square-o"></i>&nbsp; Nuevo Usuario</button>
            </div>
            <table id="tbl_usuarios" class="table table-bordered table-hover" data-name="cool-table">
            <thead>
                <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
                </tr>
            </thead>
            </table>
        </div>
    </div>
</div>



<!-- MODAL -->

<div class="modal fade" id="mEditar" tabindex="-1" role="dialog" aria-labelledby="mEditar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Editar Usuario</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmEditar" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="txtCodusuario" id="txtCodusuario"   />
                            <label class="control-label">Nombre
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtNombre" id="txtNombre" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Usuario de acceso
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtUsuario" id="txtUsuario" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label">Contraseña
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="password" name="txtContraseña" id="txtContraseña" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Perfil
                            <span class="required">
                                *
                            </span>
                            </label>
                            <select id="sPerfil" name="sPerfil" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label ">Estado
                            <span class="required">
                                    *
                            </span>
                            </label>
                            <select id="estado" name="estado" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="on">Habilitado</option>
                                <option value="off">Inhabilitado</option>
                            </select>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="fEditarItem();">Guardar cambios</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mNuevo" tabindex="-1" role="dialog" aria-labelledby="mNuevo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Nuevo Usuario</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmNuevo" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label">Nombre
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="ntxtNombre" id="ntxtNombre" class="form-control" required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="control-label">Usuario de acceso
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="ntxtUsuario" id="ntxtUsuario" class="form-control"  required="true" />
                        </div>
                        <div class="form-group col-lg-12">
                        <label class="control-label">Contraseña
                            <span class="required">
                                *
                            </span>
                        </label>
                        <input type="password" name="ntxtContraseña" id="ntxtContraseña" class="form-control"  required="true" />
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="control-label ">Perfil
                            <span class="required">
                                *
                            </span>
                        </label>
                        <select id="nsPerfil" name="nsPerfil" class="form-control">
                        </select>
                    </div>
                    
                        <div class="form-group col-lg-12">
                            <label class="control-label">Estado
                            <span class="required">
                                *
                            </span>
                            </label>
                            <select id="nestado" name="nestado" class="form-control">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="on">Habilitado</option>
                                <option value="off">Inhabilitado</option>
                            </select>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="fNuevoItem();">Guardar item</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODALS -->


<script>

    $(function(){

        $('.desactivarC').fadeIn(500);

        $("#frmEditar").submit(function( event ) {
            event.preventDefault();
            fEditarItem();
        });
        $("#frmNuevo").submit(function( event ) {
            event.preventDefault();
            fNuevoItem();
        });
        
        combobox('sPerfil',"<?php url('Lopersa/loadPerfilesSelect'); ?>",'Seleccione...');
        combobox('nsPerfil',"<?php url('Lopersa/loadPerfilesSelect'); ?>",'Seleccione...');
        
        floadUsuarios();
    });

    function floadUsuarios(){
        $('#tbl_usuarios').dataTable({
            ajax : {
                "url":  "<?php url('Lopersa/loadUsuarios'); ?>",
                "data":function (d){
                }
            },
            "aoColumnDefs" : [{
                "aTargets" : [0]
            }],
            "oLanguage" : {
                "sLengthMenu" : "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No hay Datos registrados en el sistema",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _MAX_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sLoadingRecords": "Cargando Datos...",
                "sSearch" : "",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
            },
            "searching": false,
            "aaSorting" : [[0, 'desc']],
            "aLengthMenu" : [
                [10, 15, 20, -1], 
                [10, 15, 20, "Todos"] // change per page values here
            ],
            "columns": [ //agregar configuraciones a cada una de las columnas de las tablas
                {},//column 1
                { "class": "text-center", "orderable": false },//column 2
                { "orderable": false },//column 3
                { "orderable": false },//column 4
                { "orderable": false },//column 5
                { "class": "text-center", "orderable": false }//column 6
                
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
                $('.desactivarC').fadeOut(500);
            },
            "iDisplayLength" : 10,
            'autoWidth'   : false
        });

    }

   //functions update item
    function fmodalEditar(cod, nombre, usuario, perfil, estado){
        $("#txtCodusuario").val(cod);
        $("#txtNombre").val(nombre);
        $("#txtUsuario").val(usuario);
        $("#sPerfil").val(perfil);
        $("#estado").val(estado);
        $("#mEditar").modal('show');
    }

    function fEditarItem(){
        var txtCodusuario = $("#txtCodusuario").val();
        var txtNombre = $("#txtNombre").val();
        var txtUsuario = $("#txtUsuario").val();
        var txtContraseña = $("#txtContraseña").val();
        var sPerfil = $("#sPerfil").val();
        var estado = $("#estado").val();
        

        if($.trim(txtNombre) == ''){
            toastr.error('Por favor, ingrese Nombre');
            $("#txtNombre").focus();

        }else if($.trim(txtUsuario) == ''){
            toastr.error('Por favor, ingrese Usuario.');
            $("#txtUsuario").focus();

        }else if($.trim(sPerfil) == ''){
            toastr.error('Por favor, seleccione Perfil.');
            $("#sPerfil").focus();

        }else if($.trim(estado) == ''){
            toastr.error('Por favor, seleccione Estado de Menú.');
            $("#estado").focus();

        }else{

            $.ajax({
                url : "<?php url('Lopersa/editItemUsuario'); ?>",
                type : "POST",
                data : {
                    'codusuario':txtCodusuario,
                    'nombreusuario': txtNombre,
                    'usuario' : txtUsuario,
                    'contra' :  txtContraseña,
                    'perfil' :  sPerfil,
                    'estado' : estado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item Actualizado exitosamente");
                        $("#frmEditar")[0].reset();
                        $("#mEditar").modal('hide');
                        $('#tbl_usuarios').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.message);
                    }
                }
            });
        }

    }

    //functions new item
    function fmodalNuevo(){
        $("#mNuevo").modal('show');
    }

    function fNuevoItem(){
        var ntxtNombre = $("#ntxtNombre").val();
        var ntxtUsuario = $("#ntxtUsuario").val();
        var ntxtContraseña = $("#ntxtContraseña").val();
        var nsPerfil = $("#nsPerfil").val();
        var nestado = $("#nestado").val();

        if($.trim(ntxtNombre) == ''){
            toastr.error('Por favor, ingrese Nombre.');
            $("#ntxtNombre").focus();

        }else if($.trim(ntxtUsuario) == ''){
            toastr.error('Por favor, ingrese Usuario de acceso.');
            $("#ntxtUsuario").focus();

        }else if($.trim(ntxtContraseña) == ''){
            toastr.error('Por favor, ingrese Contraseña de acceso.');
            $("#ntxtContraseña").focus();

        }else if( $.trim(nsPerfil) == ''){
            toastr.error('Por favor, seleccione Perfil.');
            $("#nsPerfil").focus();

        }else if($.trim(nestado) == ''){
            toastr.error('Por favor, seleccione Estado.');
            $("#nestado").focus();

        }else{

            $.ajax({
                url : "<?php url('Lopersa/insertItemUsuario'); ?>",
                type : "POST",
                data : {
                    'nombreusuario': ntxtNombre,
                    'usuario' : ntxtUsuario,
                    'contra' :  ntxtContraseña,
                    'perfil' : nsPerfil,
                    'estado' : nestado
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        toastr.success("Item agregado exitosamente");
                        $("#frmNuevo")[0].reset();
                        $("#mNuevo").modal('hide');
                        $('#tbl_usuarios').DataTable().ajax.reload();
                    }else{
                        toastr.error(json.message);
                    }
                }
            });
        }

    }

    function buscar(){
        $('.desactivarC').fadeIn(500);
        $('#tbl_usuarios').DataTable().ajax.reload(function(){
            $('.desactivarC').fadeOut(500);
        });
    }

    function deleteSearch(){
        $("#bEventoEpide").val('');
        $("#bMorbilidad").val('');
        $("#bEstado").val('');
        $('.desactivarC').fadeIn(500);
        $('#tbl_usuarios').DataTable().ajax.reload(function(){
            $('.desactivarC').fadeOut(500);
        });
    }

</script>