<?php
  include 'developer/var.php';
?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Mapa de impacto</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Mapa de impacto</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3 md p-20">
    <div class="col-12">
        <h4 class="text-black">Búsqueda:</h4>
        <form id="frmBusqueda" role="form" >
            <div class="row">
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Sector:</label>
                        <select id="bSector" name="bSector" class="form-control"></select>
                    </fieldset>
                </div>
                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label>Barrio:</label>
                        <select id="bBarrio" name="bBarrio" class="form-control">
                            <option value="">Todos</option>
                        </select>
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
                        <label>Estado caso:</label>
                        <select id="bEstadoCaso" name="bEstadoCaso" class="form-control">
                            <option value="">todos</option>
                            <option value="abierto">ABIERTOS</option>
                            <option value="cerrado">CERRADOS</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-lg-3 divestadopaciente" style="display:none;">
                    <fieldset class="form-group">
                        <label>Estado paciente:</label>
                        <select id="bEstadoPaciente" name="bEstadoPaciente" class="form-control">
                            <option value="">todos</option>
                            <option value="recuperado">RECUPERADOS</option>
                            <option value="fallecido">FALLECIDOS</option>
                        </select>
                    </fieldset>
                </div>


                <div class="col-lg-3">
                    <fieldset class="form-group">
                        <label style="width:100%">Acciones</label>
                        <div class="btn-group" role="group" >
                            <button type="button" class="btn btn-primary " onclick="loadMap();"><i class="fa fa-search"></i> Buscar</button>
                            <button type="button" class="btn btn-danger tooltips" data-rel="tooltip" data-placement="bottom" title="Limpiar búsqueda" onclick="deleteSearch()"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="content mt-3 md " style="background: none;border: none !important;"> 
    <div class="col-lg-12" style="padding: 0;text-align: center;">
        <div class="card" style="margin: 0;max-width: 250px;margin: 0 auto;">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-content dib" style="margin: 0 !important;">
                        <div class="stat-text" style="font-size: 18px;">Cantidad de eventos</div>
                        <div class="stat-digit cantidadeventos"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3 md p-20">

    <div class="row">
        <!-- <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-content dib">
                            <div class="stat-text">Cantidad de eventos</div>
                            <div class="stat-digit cantidadeventos"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-sm-12">
            <div id="map" style="position: relative; overflow: hidden;height: 600px;"></div>
        </div>
    </div>

</div> 

<script>

var map;
var markers = [];
var heatmap;

$(function(){
    combobox('bSector',"<?php url('Lopersa/loadSectores'); ?>",'Todos');
    $("#bSector").on("change", function(){
        combobox('bBarrio',"<?php url('Lopersa/loadBarrios'); ?>?codsector="+$(this).val(), 'Todos');
    });
    combobox('bEventoEpide',"<?php url('Lopersa/loadEventosEpide'); ?>",'Todos');
    var puerto = new google.maps.LatLng(10.988915,-74.955832);
    map = new google.maps.Map(document.getElementById('map'), {
        center: puerto,
        zoom: 16,
    });
    $("#bEstadoCaso").on("change", function () {
        if($(this).val() == 'cerrado'){
            $(".divestadopaciente").show();
        }else{
            $(".divestadopaciente").hide();
        }
    });
    loadMap();
})


function loadMap(){
    $('.desactivarC').fadeIn(500);
    if(markers.length > 0){
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }
    $.ajax({
        url: "<?php url('Lopersa/loadMap'); ?>",
        type: 'POST',
        data: {
            codsector: $("#bSector").val(),
            codbarrio: $("#bBarrio").val(),
            codevento: $("#bEventoEpide").val(),
            estadocaso : $("#bEstadoCaso").val(),
            estadopaciente : $("#bEstadoPaciente").val()
        },
        dataType: "json",
        success: function( data ) {
            data.forEach(element => {
                var pos = element.ubicacion_gps.split(',');
                markers.push(new google.maps.Marker({
                    map: map,
                    title: element.direccion,
                    position: new google.maps.LatLng(pos[0], pos[1])
                }));
            });
            $(".cantidadeventos").text(markers.length);
            $('.desactivarC').fadeOut(500);
        }
    });
}


function deleteSearch(){
    $("#bSector").val('');
    $("#bBarrio").val('');
    $("#bEventoEpide").val('');
    $("#bEstadoCaso").val('');
    $("#bEstadoPaciente").val('');
    loadMap();
}
</script>