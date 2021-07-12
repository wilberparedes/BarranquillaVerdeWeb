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
                <h1>Listado de Casos</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a>Casos</a></li>
                    <li class="active">Listado</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20 listCasos">
    <div class="col-12">
        <h4 class="text-black">Búsqueda:</h4>
        <form id="frmBusqueda" role="form" >
            <div class="row">
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Nro. de identificación:</label>
                        <input type="text" id="bIdentificacion" name="bIdentificacion" class="form-control"> 
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Nombres:</label>
                        <input type="text" id="bNombres" name="bNombres" class="form-control">
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Evento epidemiológico:</label>
                        <select id="bEventoEpide" name="bEventoEpide" class="form-control"></select>
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Morbilidad:</label>
                        <select id="bMorbilidad" name="bMorbilidad" class="form-control"></select>
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Estado:</label>
                        <select id="bEstado" name="bEstado" class="form-control">
                            <option value="">Todos</option>
                            <option value="abierto">Abierto</option>
                            <option value="reabierto">Reabierto</option>
                            <option value="cerrado">Cerrado</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label style="width:100%">Acciones</label>
                        <div class="btn-group" role="group" >
                            <button type="button" class="btn btn-primary " onclick="buscar();"><i class="fa fa-search"></i> Buscar</button>
                            <button type="button" class="btn btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="deleteSearch()"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="content mt-3 md p-20 listCasos">
    <div class="col-12  m-t-3">
        <h4 class="text-black">Listado</h4>
        <div class="table-responsive">
            <div style="width: 100%; display:block">
                <a onclick="generateExcel();" target="_blank" style="float:right;color:#fff" class="btn btn-success"><i class="ti-download"></i>&nbsp; Exportar a Excel</a>
            </div>
            <table id="tbl_casos" class="table table-bordered table-hover" data-name="cool-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. de identificación</th>
                        <th>Nombre completo</th>
                        <th>Dirección</th>
                        <th>Evento epidemiológico</th>
                        <th>Morbilidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20 updatecaso" style="display:none;">
    <div class="col-12  m-t-3">
        <h4 class="text-black"> <button type="button" onclick="fVolta();" id="btnGuardar" class="btn btn-danger"><i class="fa fa-angle-left"></i> Volver</button> Detalles del caso</h4><br>
            <form id="frmNuevoCaso" role="form">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3" style="margin-bottom: 0 !important;">DATOS CASO</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- EVENTOS EPIDEMIOLOGICOS  -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <input type="hidden" id="codcaso" name="codcaso">
                                            
                                            <label>Evento epidemiológico:</label>
                                            <select id="sEventosEpide" name="sEventosEpide" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- Morbilidad -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Morbilidad:</label>
                                            <select id="sMorbilidad" name="sMorbilidad" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- ESTADO DE CASO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Estado:</label>
                                            <span id="sEstadoCaso"></span> <br>
                                            <button type="button" onclick="updateStateCaso('cerrado','cerrado', 'CERRAR');" id="btnCerrar" class="btn btn-danger" style="display:none;">CERRAR CASO</button>
                                            <button type="button" onclick="updateStateCaso('reabierto', 'reabierto', 'REABRIR');" id="btnReabrir" class="btn btn-warning" style="display:none;">REABRIR CASO</button>
                                        </fieldset>
                                    </div>

                                    <!-- SE REALIZA PRUEBA -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Se realiza prueba:</label>
                                            <select id="sRealizaPrueba" name="sRealizaPrueba" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="si">SÍ</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    
                                    <!-- FECHA PRUEBA -->
                                    <div class="col-lg-4 col-md-6 divfechaprueba" style="display:none;"> 
                                        <fieldset class="form-group">
                                            <label>Fecha de prueba:</label>
                                            <input class="form-control" id="sFechaPrueba" name="sFechaPrueba" type="date">
                                        </fieldset>
                                    </div>


                                    <!-- RESULTADO DE PRUEBA PCR -->
                                    <div class="col-lg-4 col-md-6 divresultadopruebapcr" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Resultado prueba PCR:</label>
                                            <select id="sResultadoPruebaPCR" name="sResultadoPruebaPCR" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="Positivo">POSITIVO</option>
                                                <option value="Negativo">NEGATIVO</option>
                                                <option value="Probable">PROBABLE</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- RESULTADO DE PRUEBA SEROLOGICA -->
                                    <div class="col-lg-4 col-md-6 divresultadipruebaserologica" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Resultado prueba serológica:</label>
                                            <select id="sResultadoPruebSerologica" name="sResultadoPruebSerologica" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="Positivo">POSITIVO</option>
                                                <option value="Negativo">NEGATIVO</option>
                                                <option value="Probable">PROBABLE</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    
                                    <!-- ESTADO PACIENTE -->
                                    <div class="col-lg-4 col-md-6 divestadopaciente" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Estado paciente:</label>
                                            <select id="sEstadoPaciente" name="sEstadoPaciente" class="form-control" disabled>
                                                <option value="recuperado">RECUPERADO</option>
                                                <option value="fallecido">FALLECIDO</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3" style="margin-bottom: 0 !important;">DATOS HOGAR</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- SECTOR -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Sector:</label>
                                            <select id="sSector" name="sSector" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- BARRIO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Barrio:</label>
                                            <select id="sBarrio" name="sBarrio" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- DIRECCIÓN -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Dirección de residencia:</label><br>
                                            <!-- <input class="form-control" id="txtDireccion" name="txtDireccion" type="text"> -->
                                            <a onClick="addDirection()" id="addDirection">Agregar dirección</a>
                                            <input type="hidden" id="lat" name="lat">
                                            <input type="hidden" id="lng" name="lng">
                                        </fieldset>
                                    </div>

                                    <!-- ESTRATO ECONOMICO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Estrato socioeconómico:</label>
                                            <select id="sEstrato" name="sEstrato" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="1">ESTRATO UNO</option>
                                                <option value="2">ESTRATO DOS</option>
                                                <option value="3">ESTRATO TRES</option>
                                                <option value="4">ESTRATO CUATRO</option>
                                                <option value="5">ESTRATO CINCO</option>
                                                <option value="6">ESTRATO saveObservaCion</option>
                                                <option value="7">NO APLICA</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- NUCLEO FAMILIAR -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Nucleo familiar:</label>
                                            <select id="sNucleoFamiliar" name="sNucleoFamiliar" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3 O MÁS</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- SERVICIOS PUBLICOS -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Servicios públicos:</label>
                                            <select multiple name="sServiciosPublicos[]" class="form-control multiselect" title="Seleccione..."> 
                                                <option value="AG">AGUA</option>
                                                <option value="LU">LUZ</option>
                                                <option value="GA">GAS</option>
                                                <option value="TE">TELÉFONO</option>
                                                <option value="TV">TELEVISIÓN</option>
                                                <option value="IN">Internet</option>
                                                <option value="AL">ALCANTARILLADO</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DATOS PERSONA -->
                <div class="row">
                    <div class="col-12" id="divpersonas">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3" style="float: left;display: block;margin-top: 7px;margin-bottom: 0px !important;">DATOS PERSONA</strong>
                                <!-- <button type="button" class="btn btn-outline-light"  id="btnaddperson" onClick="addPerson()" style="float:right;"><i class="fa fa-plus"></i>  Agregar persona</button> -->
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- TIPO DOCUMENTO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Tipo documento:</label>
                                            <input type="hidden" id="codpersona" name="codpersona">
                                            <select id="sTipoDocumento" name="sTipoDocumento" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="E">Cédula de ciudadania</option>
                                                <option value="C">Cédula de extranjería</option>
                                                <option value="N">NIT</option>
                                                <option value="I">NUIP</option>
                                                <option value="P">Pasaporte</option>
                                                <option value="R">Registro civil</option>
                                                <option value="T">Tarjeta de identidad</option>
                                                <option value="X">No definido</option>
                                            </select>
                                            
                                        </fieldset>
                                    </div>

                                    <!-- DOCUMENTO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                        <label>Documento:</label>
                                        <input type="number" id="txtDocumento" name="txtDocumento" class="form-control">
                                        </fieldset>
                                    </div>
                                    
                                    <!-- NOMBRES -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Nombres:</label>
                                            <input class="form-control" id="txtNombres" name="txtNombres" type="text">
                                        </fieldset>
                                    </div>

                                    <!-- APELLIDOS -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Apellidos:</label>
                                            <input class="form-control" id="txtApellidos" name="txtApellidos" type="text">
                                        </fieldset>
                                    </div>

                                    <!-- TELÉFONO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Teléfono:</label>
                                            <input type="number" id="txtTelefono" name="txtTelefono" class="form-control">
                                        </fieldset>
                                    </div>

                                    <!-- SEXO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Sexo:</label>
                                            <select id="sSexo" name="sSexo" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="M">MASCULINO</option>
                                                <option value="F">FEMENINO</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- OCUPACION -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Ocupación:</label>
                                            <select id="sOcupacion" name="sOcupacion" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="desempleado">DESEMPLEADO</option>
                                                <option value="empleado">EMPLEADO</option>
                                                <option value="independiente">INDEPENDIENTE</option>
                                                <option value="emprendedor">EMPRENDEDOR</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    
                                    <!-- FECHA NACIMIENTO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Fecha de nacimiento:</label>
                                            <input class="form-control" id="txtFechaNacimiento" name="txtFechaNacimiento" type="date">
                                        </fieldset>
                                    </div>
                                    
                                    <!-- EDAD -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Edad:</label>
                                            <input class="form-control" id="txtEdad" name="txtEdad" type="text" readonly>
                                        </fieldset>
                                    </div>

                                    <!-- LUGAR DE NACIMIENTO -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Lugar de nacimiento:</label>
                                            <select id="sLugarNacimiento" name="sLugarNacimiento" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- NACIONALIDAD -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Nacionalidad:</label>
                                            <select id="sNacionalidad" name="sNacionalidad" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="CO">COLOMBIANO</option>
                                                <option value="EX">EXTRANJERO</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- PAIS ORIGEN -->
                                    <div class="col-lg-4 col-md-6 divpaisorigen" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>País origen:</label>
                                            <input class="form-control" id="txtPaisOrigen" name="txtPaisOrigen" type="text">
                                        </fieldset>
                                    </div>

                                    <!-- PERMISO ESPECIAL DE PERMANENCIA -->
                                    <div class="col-lg-4 col-md-6 divpermisoespecialpermanencia" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Permiso especial de permanencia:</label>
                                            <select id="sPEP" name="sPEP" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="1">SÍ</option>
                                                <option value="0">NO</option>
                                            </select>
                                        </fieldset>
                                    </div>


                                    <!-- FECHA INGRESO AL PAIS -->
                                    <div class="col-lg-4 col-md-6 divfechaingresopais" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Fecha de ingreso al país:</label>
                                            <input class="form-control" id="txtFechaIngresoPais" name="txtFechaIngresoPais" type="date">
                                        </fieldset>
                                    </div>


                                    <!-- CERTIFICADO MIGRACION -->
                                    <div class="col-lg-4 col-md-6 divcertificadomigracion" style="display:none;">
                                        <fieldset class="form-group">
                                            <label>Certificado de migración:</label>
                                            <select id="sCertificadoMigracion" name="sCertificadoMigracion" class="form-control">
                                                <option value="">Seleccione...</option>
                                                <option value="1">SÍ</option>
                                                <option value="0">NO</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- TIPO DE POBLACIÓN -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Tipo de población:</label>
                                            <select id="sTipoPoblacion" name="sTipoPoblacion" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- SINTOMAS -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Sintomas:</label>
                                            <select name="sSintomas[]" multiple class="form-control multiselectSintomas" title="Seleccione...">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- EPS -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>EPS:</label>
                                            <select id="sEps" name="sEps" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                    <!-- REGIMEN -->
                                    <div class="col-lg-4 col-md-6">
                                        <fieldset class="form-group">
                                            <label>Regimen:</label>
                                            <select id="sRegimen" name="sRegimen" class="form-control">
                                            </select>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- OBSERVACIONES -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3" style="margin-top: 5px !important;display: block;float: left;margin-bottom: 0px !important;">OBSERVACIONES </strong>
                                <button type="button" id="btnNewObservacion" class="btn btn-success" onclick="newObservacion()" style="display:none;float: right;"><i class="fa fa-plus"></i>&nbsp; Nueva</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Observaciones -->
                                    <div class="col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                            <label>Detalles:</label>
                                            <span id="txaObservaciones"></span>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 m-t-3 divbuttonguardar" style="background: #fff;border: 1px solid rgba(0,0,0,.125);display:none;">
                    <div class="">
                        <div class="card-body text-center" style="padding: 6px;">
                        <button type="button" onclick="fUpdateCenso();" id="btnGuardar" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
                        </div>
                    </div>
                </div>

            </form>
    </div>
</div>



<!-- MODAL -->

<div class="modal fade" id="mNuevaObservacion" tabindex="-1" role="dialog" aria-labelledby="mNuevaObservacion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nueva observacion</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmNuevaObservacion" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label">Ingrese detalles:
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <textarea class="form-control" name="descripcionobservacion" id="descripcionobservacion" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="saveObservaCion();">Guardar</button>
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
                <h4 class="modal-title"><strong>Nueva dirección</strong></h4>
            </div>
            <div class="modal-body">
                <!-- BEGIN FORM-->
                <form id="frmNuevo" method="POST" class="form-horizontal">
                    <div class="form-body row">
                        <div class="form-group col-lg-12">
                            <label class="control-label">Ingrese detalles:
                                <span class="required">
                                    *
                                </span>
                            </label>
                            <input type="text" name="txtDireccion" id="txtDireccion" class="form-control"  required="true" />
                        </div>

                        <div class="col-lg-12">
                            <div id="map" style="height: 300px;"></div>
                        </div>
                        
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btnsavedirection" disabled onclick="saveDirection();">Guardar dirección</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODALS -->


<script>

    var arrayestrato = ['Estrato uno', 'Estrato dos', 'Estrato tres', 'Estrato cuatro', 'Estrato cinco', 'Estrato seis', 'No aplica'];
    var nucleofamiliar = ['1', '2', '3 o más'];
    var serviciospublicos = {'AG' : 'Agua', 'LU' : 'Luz', 'GA' : 'Gas', 'TE' : 'Teléfono', 'TV' : 'Televisión', 'IN' : 'Internet', 'AL' : 'Alcantarillado'};
    var tipoid = {'E' : 'Cédula de ciudadania', 'C' : 'Cédula de extranjería', 'N' : 'NIT', 'I' : 'NUIP', 'P' : 'Pasaporte', 'R' : 'Registro civil', 'T' : 'Tarjeta de identidad', 'X' : 'No definido'};
    var nacionalidad = {'CO' : 'Colombiano', 'EX' : 'Extranjero'};
    var sinoresp = ['SÍ', 'NO'];

    
    $(function(){
        $('.desactivarC').fadeIn(500);

        $('.multiselect').selectpicker();

        $.ajax({
            url: "<?php url('Lopersa/sLoadSintomas'); ?>",
            type : "POST",
            dataType: "JSON",
            success: function(data){
                var op = '';
                $.each(data, function(k,v){
                    op += '<option value="'+v.cod+'">'+v.nombre.toUpperCase()+'</option>';
                });
                $('.multiselectSintomas').html(op);
            }, complete: function(){
                $('.multiselectSintomas').selectpicker();
            }
        });

        $("#sNacionalidad").on("change", function () {
            if($(this).val() == 'EX'){
                $(".divpaisorigen").show();
                $(".divpermisoespecialpermanencia").show();
                $(".divfechaingresopais").show();
                $(".divcertificadomigracion").show();
            }else{
                $(".divpaisorigen").hide();
                $(".divpermisoespecialpermanencia").hide();
                $(".divfechaingresopais").hide();
                $(".divcertificadomigracion").hide();
            }
        });

        combobox('sEventosEpide',"<?php url('Lopersa/loadEventosEpide'); ?>",'Seleccione...');
        combobox('bEventoEpide',"<?php url('Lopersa/loadEventosEpide'); ?>",'TODOS');

        combobox('sLugarNacimiento',"<?php url('Lopersa/loadLugarNacimiento'); ?>",'seleccione...');
        
        combobox('sMorbilidad',"<?php url('Lopersa/loadMorbilidades'); ?>",'NINGUNA');
        combobox('bMorbilidad',"<?php url('Lopersa/bloadMorbilidades'); ?>",'TODAS');

        combobox('sEps',"<?php url('Lopersa/loadEps'); ?>",'Seleccione...');
        combobox('sSector',"<?php url('Lopersa/loadSectores'); ?>",'Seleccione...');

        $("#sSector").on("change", function(){
            combobox('sBarrio',"<?php url('Lopersa/loadBarrios'); ?>?codsector="+$(this).val(), 'Seleccione...');
        });

        combobox('sRegimen',"<?php url('Lopersa/loadRegimenes'); ?>",'Seleccione...');
        combobox('sTipoPoblacion',"<?php url('Lopersa/loadTipoPoblacion'); ?>",'Seleccione...');

        //---------------
        geolocate();
        // ---------------------------
        $( "#txtFechaNacimiento" ).change(function() {
            console.log($(this).val());
            $("#txtEdad").val(calcular_edad($(this).val()));
        });
        
        floadCasos();
    });

    var map;
    var markers = [];
    var geocoder;

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: position.coords.latitude, lng: position.coords.longitude},
                    zoom: 16,
                    mapTypeId: 'roadmap',
                    zoomControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false
                });
                geocoder = new google.maps.Geocoder;
                initAutocomplete();
                map.addListener('center_changed', function() {
                    markers.forEach(function(marker) {
                        marker.setPosition(map.getCenter());
                    });
                });

                map.addListener('dragend', function() {
                    console.log("dragend");
                    geocoder.geocode({'location': map.getCenter()}, function(results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                $(".btnsavedirection").attr('disabled', false);
                                $("#lat").val(map.getCenter().lat());
                                $("#lng").val(map.getCenter().lng());
                                $("#txtDireccion").val(results[0].formatted_address);
                            } else {
                                alert('No results found');
                            }
                        } else {
                            console.log('Geocoder failed due to: ' + status);
                        }
                    });
                });
                $('.desactivarC').fadeOut(500);
            });
            
        }
    }

    function initAutocomplete() {

        var input = document.getElementById('txtDireccion');
        var searchBox = new google.maps.places.SearchBox(input);

        map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    alert("Returned place contains no geometry");
                    return;
                }
                markers.push(new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                $(".btnsavedirection").attr('disabled',false);
                $("#lat").val(place.geometry.location.lat());
                $("#lng").val(place.geometry.location.lng());
                map.setCenter(place.geometry.location);

            });
            map.fitBounds(bounds);
            map.setZoom(18);

        });
    }
    
    function addDirection(){
        if( $("#lat").val() == '' && $("#lng").val() == '' && $("#txtDireccion").val() == '')
            $(".btnsavedirection").attr('disabled',true);
        $("#mNuevo").modal('show');
    }

    function saveDirection(){
        $("#addDirection").text($("#txtDireccion").val());
        $("#mNuevo").modal('hide');
    }

    function floadCasos(){
        $('.desactivarC').fadeIn(500);
        $('#tbl_casos').dataTable({
            ajax : {
                "url":  "<?php url('Lopersa/loadCasos'); ?>",
                "data":function (d){
                    d.identificacion = $("#bIdentificacion").val();
                    d.nombres = $("#bNombres").val();
                    d.eventoepide = $("#bEventoEpide").val();
                    d.morbilidad = $("#bMorbilidad").val();
                    d.estado = $("#bEstado").val();
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
                { "orderable": false },//column 2
                { "orderable": false },//column 3
                { "class": "text-center", "orderable": false },//column 4
                { "class": "text-center", "orderable": false },//column 5
                { "class": "text-center", "orderable": false },//column 6
                { "orderable": false },//column 7
                { "class": "text-center", "orderable": false }//column 8
                
            ],
            initComplete: function(oSettings, json) {
                $('[data-rel="tooltip"]').tooltip(); 
                $('.desactivarC').fadeOut(500);
            },
            "iDisplayLength" : 10,
            'autoWidth'   : false
        });

    }

    function fVolta(){
        $(".viewCaso").hide();
        $(".updatecaso").hide();
        
        $(".listCasos").show();
        $("#codcaso").val('');
        $("#btnNewObservacion").hide();
        $('.multiselect').selectpicker('val', []);
        $('.multiselectSintomas').selectpicker('val', []);
        $("#addDirection").text('Agregar dirección');
        $("#txtDireccion").val('');
        $("#frmNuevoCaso")[0].reset();
        $('.divfechaprueba').hide();
        $('.divresultadipruebaserologica').hide();
        $('.divresultadopruebapcr').hide();
        $(".divbuttonguardar").hide();
    }



    function fMostarCaso(id){
        $('.desactivarC').fadeIn(500);
        $(".viewCaso").hide();
        $(".updatecaso").show();
        $(".listCasos").hide();

        $("#codcaso").val(id);
        loadObservaciones(id);
        $.ajax({
            url: "<?php url('Lopersa/detalleCaso'); ?>",
            type : "POST",
            dataType: "JSON",
            data: {id},
            success: function(data){
                $("#sEventosEpide").val(data.caso.codeventoepide);
                $("#sMorbilidad").val((data.caso.codmorbilidad == 1 ?  "" : data.caso.codmorbilidad));
                if(data.caso.estadocaso == 'abierto' || data.caso.estadocaso == 'reabierto'){
                    $("#btnNewObservacion").show();
                    $("#btnCerrar").show();
                    $("#btnReabrir").hide();
                    $("#addDirection").attr('onclick', 'addDirection()');
                    $(".divestadopaciente").hide();
                }else{
                    $("#addDirection").removeAttr('onclick');
                    $("#btnNewObservacion").hide();
                    $("#btnCerrar").hide();
                    $("#btnReabrir").show();
                    $(".divestadopaciente").show();
                    
                    $("#sEstadoPaciente").val(data.caso.estadopaciente);
                }

                $("#sRealizaPrueba").val(data.caso.realizaprueba);
                if(data.caso.realizaprueba == 'si'){
                    $('.divfechaprueba').show();
                    $("#sFechaPrueba").val(data.caso.fechaprueba);
                    //fin fecha
                    $('.divresultadipruebaserologica').show();
                    console.log(data.caso.resultadoprueba);
                    $("#sResultadoPruebSerologica").val(data.caso.resultadoprueba);

                    $('.divresultadopruebapcr').show();
                    $("#sResultadoPruebaPCR").val(data.caso.resultadopruebapcr);
                }else{
                    $('.divfechaprueba').hide();
                    $('.divresultadipruebaserologica').hide();
                    $('.divresultadopruebapcr').hide();
                }

                
                $("#sEstadoCaso").html(data.caso.estadocaso.toUpperCase());
                

                $("#sSector").val(data.caso.codsector).trigger('change');
                setTimeout(() => {
                    $("#sBarrio").val(data.caso.codbarrio);
                }, 500);
                $("#addDirection").html(data.caso.direccion.toUpperCase());
                var geo = data.caso.geoposicion.split(",");
                $("#lat").val(geo[0]);
                $("#lng").val(geo[1]);
                $("#txtDireccion").val(data.caso.direccion);
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                console.log(geo);
                markers = [];
                markers.push(new google.maps.Marker({
                    map: map,
                    title: data.caso.direccion,
                    position: new google.maps.LatLng({lat: parseFloat($("#lat").val()), lng: parseFloat($("#lng").val())})
                }));
                // map.setCenter(new google.maps.LatLng({lat: parseFloat($("#lat").val()), lng: parseFloat($("#lng").val())}));

                $("#sEstrato").val(data.caso.estrato);
                $("#sNucleoFamiliar").val(data.caso.nucleofamiliar);
                
                $('.multiselect').selectpicker('val', data.caso.serviciospublicos.split(","));
                $.each(data.caso.serviciospublicos.split(","), function(i, e){
                    $(".multiselect option[value='" + e + "']").prop("selected", true);
                });

                var element = data.personas[0];
                
                $("#codpersona").val(element.codpersona);
                $("#sTipoDocumento").val(element.tipoidentificacion);
                $("#txtDocumento").val(element.numidentificacion);
                $("#txtNombres").val(element.nombres.toUpperCase());
                $("#txtApellidos").val(element.apellidos.toUpperCase());
                $("#txtTelefono").val(element.telefono);
                $("#sSexo").val(element.sexo);
                $("#sOcupacion").val(element.ocupacion);
                $("#txtFechaNacimiento").val(element.fechanacimiento).trigger('change');
                $("#sLugarNacimiento").val(element.lugarnacimiento);
                $("#sNacionalidad").val(element.nacionalidad).trigger('change');

                if(element.nacionalidad == 'EX'){
                    $("#txtPaisOrigen").val(element.paisorigen.toUpperCase());
                    $("#sPEP").val(element.pep);
                    $("#txtFechaIngresoPais").val(element.fechaingresopais);
                    $("#sCertificadoMigracion").val(element.certmigracion);
                }
                
                $("#sTipoPoblacion").val(element.tipopoblacion);
                $('.multiselectSintomas').selectpicker('val', element.sintomas.split(","));
                $.each(element.sintomas.split(","), function(i, e){
                    $(".multiselectSintomas option[value='" + e + "']").prop("selected", true);
                });
                $("#sEps").val(element.codeps);
                $("#sRegimen").val(element.codregimen);

                if(data.caso.estadocaso == 'cerrado'){
                    $("#sEventosEpide").attr('disabled', true);
                    $("#sMorbilidad").attr('disabled', true);
                    $("#sEstadoCaso").attr('disabled', true);
                    $("#sRealizaPrueba").attr('disabled', true);
                    $("#sFechaPrueba").attr('disabled', true);
                    $("#sResultadoPruebSerologica").attr('disabled', true);
                    $("#sPruebaPSR").attr('disabled', true);
                    $("#sResultadoPruebaPCR").attr('disabled', true);

                    $("#sSector").attr('disabled', true);
                    $("#sBarrio").attr('disabled', true);
                    $("#sEstrato").attr('disabled', true);
                    $("#sNucleoFamiliar").attr('disabled', true);
                    
                    $('.multiselect').attr('disabled', true);
                    $("#sTipoDocumento").attr('disabled', true);
                    $("#txtDocumento").attr('disabled', true);
                    $("#txtNombres").attr('disabled', true);
                    $("#txtApellidos").attr('disabled', true);
                    $("#txtTelefono").attr('disabled', true);
                    $("#sSexo").attr('disabled', true);
                    $("#sOcupacion").attr('disabled', true);
                    
                    $("#txtFechaNacimiento").attr('disabled', true);
                    $("#sLugarNacimiento").attr('disabled', true);
                    $("#sNacionalidad").attr('disabled', true);

                    $("#txtPaisOrigen").attr('disabled', true);
                    $("#sPEP").attr('disabled', true);
                    $("#txtFechaIngresoPais").attr('disabled', true);
                    $("#sCertificadoMigracion").attr('disabled', true);
                    
                    $("#sTipoPoblacion").attr('disabled', true);
                    $('.multiselectSintomas').attr('disabled', true);
                    $("#sEps").attr('disabled', true);
                    $("#sRegimen").attr('disabled', true);
                    $(".divbuttonguardar").hide();
                }else{
                    $("#sEventosEpide").attr('disabled', false);
                    $("#sMorbilidad").attr('disabled', false);
                    $("#sEstadoCaso").attr('disabled', false);
                    $("#sRealizaPrueba").attr('disabled', false);
                    $("#sFechaPrueba").attr('disabled', false);
                    $("#sResultadoPruebSerologica").attr('disabled', false);
                    $("#sPruebaPSR").attr('disabled', false);
                    $("#sResultadoPruebaPCR").attr('disabled', false);

                    $("#sSector").attr('disabled', false);
                    $("#sBarrio").attr('disabled', false);
                    $("#sEstrato").attr('disabled', false);
                    $("#sNucleoFamiliar").attr('disabled', false);
                    
                    $('.multiselect').attr('disabled', false);
                    $("#sTipoDocumento").attr('disabled', false);
                    $("#txtDocumento").attr('disabled', false);
                    $("#txtNombres").attr('disabled', false);
                    $("#txtApellidos").attr('disabled', false);
                    $("#txtTelefono").attr('disabled', false);
                    $("#sSexo").attr('disabled', false);
                    $("#sOcupacion").attr('disabled', false);
                    $("#txtFechaNacimiento").attr('disabled', false);
                    $("#sLugarNacimiento").attr('disabled', false);
                    $("#sNacionalidad").attr('disabled', false);

                    $("#txtPaisOrigen").attr('disabled', false);
                    $("#sPEP").attr('disabled', false);
                    $("#txtFechaIngresoPais").attr('disabled', false);
                    $("#sCertificadoMigracion").attr('disabled', false);
                    
                    $("#sTipoPoblacion").attr('disabled', false);
                    $('.multiselectSintomas').attr('disabled', false);
                    $("#sEps").attr('disabled', false);
                    $("#sRegimen").attr('disabled', false);
                    $(".divbuttonguardar").show();
                }
            }, complete: function(){
                $('.desactivarC').fadeOut(500);
            }
        });
    }

    function loadObservaciones(id){
        $.ajax({
            url : "<?php url('Lopersa/loadObservaciones'); ?>",
            type : "POST",
            data : {
                codcaso : id
            },
            dataType : "JSON",
            success : function (json){

                var htmlob = '<ul style="margin: 0 !important;">';
                if(json.observaciones.length != 0){
                    json.observaciones.forEach(element => {
                        htmlob += '<li style="text-decoration: none;list-style: none;padding: 15px 0px;margin: 0;border-bottom: 1px solid rgba(0,0,0,.2);">';
                        htmlob += '<div style="display: block;overflow: hidden;"><div class="stat-text" style="font-weight: bold;float: left;">Usuario: '+element.nombreusuario+'</div>';
                        htmlob += '<div class="stat-text" style="font-weight: bold;float: right;">Fecha: '+element.fechaformato+'</div></div>';
                        htmlob += '<div class="stat-digit">'+element.descripcion_obc.toUpperCase()+'</div>';
                        htmlob += '</li>';
                    });
                }else{
                    htmlob += '<li style="text-decoration: none;list-style: none;padding: 15px 0px;margin: 0;border-bottom: 1px solid rgba(0,0,0,.2);">';
                    htmlob += '<div class="stat-digit">Ninguna</div>';
                    htmlob += '</li>';
                }
                htmlob += "</ul>";
                $("#txaObservaciones").html(htmlob);

            }, complete: function(){
                $('.desactivarC').fadeOut(500);
            }
        });
    }

    function newObservacion(){
        $("#mNuevaObservacion").modal('show');
    }

    function saveObservaCion(){
        $(".form-control").removeClass("is-invalid");
        var descripcion = $.trim($("#descripcionobservacion").val());
        if(descripcion == ''){
            toastr.error('Por favor, ingrese detalles de Observación.');
            $("#descripcionobservacion").focus();
            $("#descripcionobservacion").addClass("is-invalid");
        }else{
            $('.desactivarC').fadeIn(500);
            console.log($("#codcaso").val());
            $.ajax({
                url : "<?php url('Lopersa/nuevaObservacion'); ?>",
                type : "POST",
                data : {
                    codcaso : $("#codcaso").val(),
                    descripcion
                },
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        $("#mNuevaObservacion").modal('hide');
                        $("#frmNuevaObservacion")[0].reset();
                        toastr.success("Observacion registrada con éxito!");
                        loadObservaciones($("#codcaso").val());
                    }else{
                        toastr.error(json.message);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
        }
    }

    function fUpdateCenso(){
        $(".form-control").removeClass("is-invalid");
        var regexname = /^[0-9]*$/;
        var sEstadoCaso = $("#sEstadoCaso").val();

        var sTipoDocumento = $.trim($("#sTipoDocumento").val());
        var txtDocumento = $.trim($("#txtDocumento").val());
        var txtNombres = $.trim($("#txtNombres").val());
        var txtApellidos = $.trim($("#txtApellidos").val());
        var txtTelefono = $.trim($("#txtTelefono").val());
        var sSexo = $.trim($("#sSexo").val());
        var sOcupacion = $.trim($("#sOcupacion").val());
        var txtFechaNacimiento = $.trim($("#txtFechaNacimiento").val());
        var sLugarNacimiento = $.trim($("#sLugarNacimiento").val());
        
        var sNacionalidad = $.trim($("#sNacionalidad").val());

        var txtPaisOrigen = $.trim($("#txtPaisOrigen").val());
        var divpaisorigen = $('.divpaisorigen').css('display');

        var sPEP = $.trim($("#sPEP").val());
        var divpermisoespecialpermanencia = $('.divpermisoespecialpermanencia').css('display');

        var txtFechaIngresoPais = $.trim($("#txtFechaIngresoPais").val());
        var divfechaingresopais = $('.divfechaingresopais').css('display');
        
        var sCertificadoMigracion = $.trim($("#sCertificadoMigracion").val());
        var divcertificadomigracion = $('.divcertificadomigracion').css('display');
           
        var sTipoPoblacion = $.trim($("#sTipoPoblacion").val());
        var sSector = $.trim($("#sSector").val());
        var sBarrio = $.trim($("#sBarrio").val());
        var txtDireccion = $.trim($("#txtDireccion").val());
        var sEstrato = $.trim($("#sEstrato").val());
        var sNucleoFamiliar = $.trim($("#sNucleoFamiliar").val());
        var sServiciosPublicos = $('.multiselect').selectpicker('val');
        var sEventosEpide = $.trim($("#sEventosEpide").val());
        var sMorbilidad = $.trim($("#sMorbilidad").val());
        var sEps = $.trim($("#sEps").val());
        var sRegimen = $.trim($("#sRegimen").val());

        var sSintomas = $('.multiselectSintomas').selectpicker('val');

        // new data
        var sRealizaPrueba = $.trim($("#sRealizaPrueba").val());
        var divfechaprueba = $('.divfechaprueba').css('display');
        var sFechaPrueba = $.trim($("#sFechaPrueba").val());
        var divresultadipruebaserologica = $('.divresultadipruebaserologica').css('display');
        var sResultadoPruebSerologica = $.trim($("#sResultadoPruebSerologica").val());

        var sPruebaPSR = $.trim($("#sPruebaPSR").val());
        var divresultadopruebapcr = $('.divresultadopruebapcr').css('display');
        var sResultadoPruebaPCR = $.trim($("#sResultadoPruebaPCR").val());
        
        if(sEventosEpide == ''){
            toastr.error('Por favor, seleccione Eventos Epidemiológico.');
            $("#sEventosEpide").focus();
            $("#sEventosEpide").addClass("is-invalid");
        }
        // else if(sMorbilidad == ''){
        //     toastr.error('Por favor, seleccione Morbilidad.');
        //     $("#sMorbilidad").focus();
        //     $("#sMorbilidad").addClass("is-invalid");
        // }
        // else if(sEstadoCaso == ''){
        //     toastr.error('Por favor, seleccione Estado del Caso.');
        //     $("#sEstadoCaso").focus();
        //     $("#sEstadoCaso").addClass("is-invalid");
        // }
        else if(sRealizaPrueba == ''){
            toastr.error('Por favor, seleccione si realiza prueba.');
            $("#sRealizaPrueba").focus();
            $("#sRealizaPrueba").addClass("is-invalid");
        }
        else if(divfechaprueba == 'block' && sFechaPrueba == ''){
            toastr.error('Por favor, seleccione Fecha de Prueba.');
            $("#sFechaPrueba").focus();
            $("#sFechaPrueba").addClass("is-invalid");
        }
        else if(divresultadopruebapcr == 'block' && sResultadoPruebaPCR == ''){
            toastr.error("Por favor, seleccione Resultado de Prueba PSR" );
            $("#sResultadoPruebaPCR").focus();
            $("#sResultadoPruebaPCR").addClass("is-invalid");
        }
        else if(divresultadipruebaserologica == 'block' && sResultadoPruebSerologica == ''){
            toastr.error('Por favor, seleccione Resultado de Prueba.');
            $("#sResultadoPruebSerologica").focus();
            $("#sResultadoPruebSerologica").addClass("is-invalid");
        }
        


        else if(sSector == ''){
            toastr.error('Por favor, seleccione Sector.');
            $("#sSector").focus();
            $("#sSector").addClass("is-invalid");
        }
        else if(sBarrio == ''){
            toastr.error('Por favor, seleccione Barrio.');
            $("#sBarrio").focus();
            $("#sBarrio").addClass("is-invalid");
        }
        else if($("#addDireccion").text() == 'Agregar dirección'){
            toastr.error('Por favor, agrege dirección.');
        }
        else if($("#lat").val() == '' || $("#lng").val() == ''){
            toastr.error('Por favor, agrege nuevamente la dirección ocurrió un error al obtener latitud y longitud.');
        }
        else if(sEstrato == ''){
            toastr.error('Por favor, seleccione Estrato económico.');
            $("#sEstrato").focus();
            $("#sEstrato").addClass("is-invalid");
        }
        else if(sNucleoFamiliar == ''){
            toastr.error('Por favor, seleccione Nucleo Familiar.');
            $("#sNucleoFamiliar").focus();
            $("#sNucleoFamiliar").addClass("is-invalid");
        }
        else if(sServiciosPublicos.length == 0){
            toastr.error('Por favor, seleccione Servicios Públicos.');
            $(".multiselect").focus();
            $(".multiselect").addClass("is-invalid");
        }
        else if(sTipoDocumento == ''){
            toastr.error('Por favor, seleccione Tipo documento.');
            $("#sTipoDocumento").focus();
            $("#sTipoDocumento").addClass("is-invalid");
        }
        else if(txtDocumento == ''){
            toastr.error('Por favor, ingrese Documento.');
            $("#txtDocumento").focus();
            $("#txtDocumento").addClass("is-invalid");
        }
        else if(!regexname.test(txtDocumento)){
            toastr.error("Ingrese solo números en Documento");
            $("#txtDocumento").focus();
            $("#txtDocumento").addClass("is-invalid");
        }
        else if(txtNombres == ''){
            toastr.error('Por favor, ingrese Nombres.');
            $("#txtNombres").focus();
            $("#txtNombres").addClass("is-invalid");
        }
        else if(txtApellidos == ''){
            toastr.error('Por favor, ingrese Apellidos.');
            $("#txtApellidos").focus();
            $("#txtApellidos").addClass("is-invalid");
        }
        else if(txtTelefono == ''){
            toastr.error('Por favor, ingrese Teléfono.');
            $("#txtTelefono").focus();
            $("#txtTelefono").addClass("is-invalid");
        }
        else if(!regexname.test(txtTelefono)){
            toastr.error("Ingrese solo números en Teléfono");
            $("#txtTelefono").focus();
            $("#txtTelefono").addClass("is-invalid");
        }

        else if(sSexo == ''){
            toastr.error('Por favor, seleccione Sexo.');
            $("#sSexo").focus();
            $("#sSexo").addClass("is-invalid");
        }
        else if(sOcupacion == ''){
            toastr.error('Por favor, seleccione Ocupación.');
            $("#sOcupacion").focus();
            $("#sOcupacion").addClass("is-invalid");
        }


        else if(txtFechaNacimiento == ''){
            toastr.error('Por favor, seleccione Fecha de Nacimiento.');
            $("#txtFechaNacimiento").focus();
            $("#txtFechaNacimiento").addClass("is-invalid");
        }
        else if(sLugarNacimiento == ''){
            toastr.error('Por favor, seleccione Lugar de Nacimiento.');
            $("#sLugarNacimiento").focus();
            $("#sLugarNacimiento").addClass("is-invalid");
        }
        
        else if(sNacionalidad == ''){
            toastr.error('Por favor, seleccione Nacionalidad.');
            $("#sNacionalidad").focus();
            $("#sNacionalidad").addClass("is-invalid");
        }
        else if(divpaisorigen == 'block' && txtPaisOrigen == ''){
            toastr.error("Por favor, ingrese País de Origen");
            $("#txtPaisOrigen").focus();
            $("#txtPaisOrigen").addClass("is-invalid");
        }
        else if(divpermisoespecialpermanencia == 'block' && sPEP == ''){
            toastr.error("Por favor, ingrese si tiene Permiso Especial de Permanencia");
            $("#sPEP").focus();
            $("#sPEP").addClass("is-invalid");
        }
        else if(divfechaingresopais == 'block' && txtFechaIngresoPais == ''){
            toastr.error("Por favor, seleccione Fecha de Ingreso al País");
            $("#txtFechaIngresoPais").focus();
            $("#txtFechaIngresoPais").addClass("is-invalid");
        }
        else if(divcertificadomigracion == 'block' && sCertificadoMigracion == ''){
            toastr.error("Por favor, seleccione si tiene Certificado de Migración");
            $("#sCertificadoMigracion").focus();
            $("#sCertificadoMigracion").addClass("is-invalid");
        }
        else if(sTipoPoblacion == ''){
            toastr.error('Por favor, seleccione Tipo de Población.');
            $("#sTipoPoblacion").focus();
            $("#sTipoPoblacion").addClass("is-invalid");
        }
        else if(sSintomas.length == 0){
            toastr.error('Por favor, seleccione Sintomas.');
            $(".multiselectSintomas").focus();
            $(".multiselectSintomas").addClass("is-invalid");
        }
        else if(sEps == ''){
            toastr.error('Por favor, seleccione Eps.');
            $("#sEps").focus();
            $("#sEps").addClass("is-invalid");
        }
        else if(sRegimen == ''){
            toastr.error('Por favor, seleccione Regimen.');
            $("#sRegimen").focus();
            $("#sRegimen").addClass("is-invalid");
        }
        else{
            $('.desactivarC').fadeIn(500);
            var datosCenso = $("#frmNuevoCaso").serialize();
            $.ajax({
                url : "<?php url('Lopersa/updateCenso'); ?>",
                type : "POST",
                data : datosCenso+"&direc="+$("#addDirection").text().toUpperCase(),
                dataType : "JSON",
                success : function (json){
                    if(json.success == true){
                        
                        fVolta();
                        $('#tbl_casos').DataTable().ajax.reload(function(){
                            $('.desactivarC').fadeOut(500);
                            markers.forEach(function(marker) {
                                marker.setMap(null);
                            });
                            markers = [];
                        });
                        toastr.success("Caso actualizado con éxito!");
                        // window.location.reload();
                    }else{
                        toastr.error(json.message);
                    }
                }, complete: function(){
                    $('.desactivarC').fadeOut(500);
                }
            });
        }

    }


    function updateStateCaso(estado, pal, est){
        var msg = '';
        if(estado == 'cerrado')
            msg = '<br/><br/> <fieldset class="form-group"><label>Estado paciente:</label><select id="s1EstadoPaciente" name="s1EstadoPaciente" class="form-control"><option value="">Seleccione...</option><option value="recuperado">RECUPERADO</option><option value="fallecido">FALLECIDO</option></select></fieldset>';
        bootbox.confirm({
            message: '¿Está seguro de '+est+' el Caso? '+msg,
            buttons: {
                confirm: {
                    label: 'SÍ',
                },
                cancel: {
                    label: 'NO',
                }
            },
            callback: function(result) {
                if (result) {
                    var sEstadoPaciente = $("#s1EstadoPaciente").val();
                    if(estado == 'cerrado'){
                        if(sEstadoPaciente != ''){
                            $('.desactivarC').fadeIn(500);
                            console.log($("#codcaso").val());
                            $.ajax({
                                url : "<?php url('Lopersa/updateEstadoCaso'); ?>",
                                type : "POST",
                                data : {
                                    codcaso : $("#codcaso").val(),
                                    estado,
                                    estadopaciente: sEstadoPaciente
                                },
                                dataType : "JSON",
                                success : function (json){
                                    if(json.success == true){
                                        $('#tbl_casos').DataTable().ajax.reload(function(){
                                            $('.desactivarC').fadeOut(500);
                                            fVolta();
                                            markers.forEach(function(marker) {
                                                marker.setMap(null);
                                            });
                                            markers = [];
                                            toastr.success("Caso "+pal+" con éxito!");
                                        });
        
                                    }else{
                                        toastr.error(json.message);
                                    }
                                }, complete: function(){
                                    
                                }
                            });
    
                        }else{
                            toastr.error('Por favor, seleccione Estado de Paciente');
                        }
                    }else{
                        $('.desactivarC').fadeIn(500);
                            console.log($("#codcaso").val());
                            $.ajax({
                                url : "<?php url('Lopersa/updateEstadoCaso'); ?>",
                                type : "POST",
                                data : {
                                    codcaso : $("#codcaso").val(),
                                    estado
                                },
                                dataType : "JSON",
                                success : function (json){
                                    if(json.success == true){
                                        $('#tbl_casos').DataTable().ajax.reload(function(){
                                            $('.desactivarC').fadeOut(500);
                                            fVolta();
                                            markers.forEach(function(marker) {
                                                marker.setMap(null);
                                            });
                                            markers = [];
                                            toastr.success("Caso "+pal+" con éxito!");
                                        });
        
                                    }else{
                                        toastr.error(json.message);
                                    }
                                }, complete: function(){
                                    
                                }
                            });
                    }
                }
        }});
        
    }


    function buscar(){
        $('.desactivarC').fadeIn(500);
        $('#tbl_casos').DataTable().ajax.reload(function(){
            $('.desactivarC').fadeOut(500);
        });
    }

    function deleteSearch(){
        $("#bIdentificacion").val('');
        $("#bNombres").val('');
        $("#bEventoEpide").val('');
        $("#bMorbilidad").val('');
        $("#bEstado").val('');
        $('.desactivarC').fadeIn(500);
        $('#tbl_casos').DataTable().ajax.reload(function(){
            $('.desactivarC').fadeOut(500);
        });
    }


    function generateExcel(){
        $('.desactivarC').fadeIn(500);
        $.ajax({
            url : "<?php url('ToExcel'); ?>",
            type : "POST",
            dataType : "JSON",
            success : function (json){
                // console.log(json);

                window.location = json.link;
                // console.log(json.link);
            }, complete: function(){
                $('.desactivarC').fadeOut(500);
            }
        });

    }
</script>