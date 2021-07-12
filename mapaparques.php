<?php
  include 'developer/var.php';
?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Mapa de parques</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Mapa de parques</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3 md " style="background: none;border: none !important;"> 
    <div class="col-lg-12" style="padding: 0;text-align: center;">
        <div class="card" style="margin: 0;max-width: 250px;margin: 0 auto;">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-content dib" style="margin: 0 !important;">
                        <div class="stat-text" style="font-size: 18px;">Total de Parques</div>
                        <div class="stat-digit cantidadeventos"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3 md p-20">
    <div class="row">
        <div class="col-sm-12">
            <div id="map" style="position: relative; overflow: hidden;height: 600px;"></div>
        </div>
    </div>
</div> 

<script>

var map;
var markers = [];

$(function(){
    var bq = new google.maps.LatLng(10.994589, -74.799138);
    map = new google.maps.Map(document.getElementById('map'), {
        center: bq,
        zoom: 13,
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
        dataType: "json",
        success: function( data ) {
            var marker;
            var infowindow = new google.maps.InfoWindow();
            data.forEach((element, i) => {
                marker = new google.maps.Marker({
                    map: map,
                    title: element.direccion,
                    position: new google.maps.LatLng(element.latitude, element.longitude)
                })
                markers.push(marker);
                marker.addListener("click", () => {
                    // map.setZoom(8);
                    
                    // map.setCenter(marker.getPosition());
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent("<b>Nombre:</b> "+element.name_prq+" <br/><b>Total de reportes:</b> "+element.total);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            });
            $(".cantidadeventos").text(markers.length);
            $('.desactivarC').fadeOut(500);
        },
        complete: function(){
        },
        error: function (err) {
            console.log(err)
        }
    });
}


function deleteSearch(){
    loadMap();
}
</script>