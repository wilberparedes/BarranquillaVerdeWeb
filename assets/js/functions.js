$(function() {
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-center';

    $(document).on('focus', 'input[type=number]', function(e) {
        $(this).on('wheel.disableScroll', function(e) {
            e.preventDefault();
        });
    });
    $(document).on('blur', 'input[type=number]', function(e) {
        $(this).off('wheel.disableScroll');
    });

    $('#menuToggle').on('click', function(event) {
        $('#bb').toggleClass('open');
        if ($('body').hasClass('open')) {
            console.log('cerrado');
            $("#main-menu li").removeClass("show");
            if (localStorage.codsuppagBQV != 'undefined') {
                $("#m" + localStorage.codsuppagBQV).removeClass("show");
                $("#m" + localStorage.codsuppagBQV + " ul").removeClass("show");
            }
        } else {
            setTimeout(function() {
                // $("#main-menu li").removeClass("show active");
                if (localStorage.codsuppagBQV != 'undefined') {
                    console.log(localStorage.codsuppagBQV);
                    $("#m" + localStorage.codsuppagBQV).addClass("show");
                    $("#m" + localStorage.codsuppagBQV + " ul").addClass("show active");
                    $("#m" + localStorage.idpaginaBQV).addClass("active");
                } else {
                    $("#m" + localStorage.idpaginaBQV).addClass("active");
                }
            }, 100);
            // olaa
            console.log('abiertp');
        }
    });

});


function loadpag(data, id, codsup) {
    localStorage.setItem('paginaBQV', data);
    localStorage.setItem('idpaginaBQV', id);
    localStorage.setItem('codsuppagBQV', codsup);
    $("#contenido").load(data);
    reloadmenu();
}

function reloadmenu() {
    $("#left-panel").load('../Menu', function() {

        // $("#main-menu li").removeClass("show active");
        // if(localStorage.codsuppagBQV != 'undefined'){
        // 	// $("#m"+localStorage.codsuppagBQV).addClass("show");
        //   // $("#m"+localStorage.codsuppagBQV+ " ul").addClass("show active");
        //   $("#m"+localStorage.codsuppagBQV+ " ul").addClass("active");
        // 	$("#m"+localStorage.idpaginaBQV).addClass("active");
        // }else{
        //   $("#m"+localStorage.idpaginaBQV).addClass("active");
        // }
        if ($('body').hasClass('open')) {
            console.log('cerrado');
            $("#main-menu li").removeClass("show");
            if (localStorage.codsuppagBQV != 'undefined') {
                $("#m" + localStorage.codsuppagBQV).removeClass("show");
                $("#m" + localStorage.codsuppagBQV + " ul").removeClass("show");
            }
        } else {
            setTimeout(function() {
                // $("#main-menu li").removeClass("show active");
                if (localStorage.codsuppagBQV != 'undefined') {
                    console.log(localStorage.codsuppagBQV);
                    $("#m" + localStorage.codsuppagBQV).addClass("show");
                    $("#m" + localStorage.codsuppagBQV + " ul").addClass("show active");
                    $("#m" + localStorage.idpaginaBQV).addClass("active");
                } else {
                    $("#m" + localStorage.idpaginaBQV).addClass("active");
                }
            }, 100);
        }
    });
}

/*//////////////////////////////////////////////////////////////////////////////*/
function combobox(id, url, inival, params) {
    var localurl = url;
    $.ajax({
        url: localurl,
        type: "POST",
        data: { params: params },
        jsonpCallback: id,
        dataType: "JSON",
        success: function(json) {
            var option = "<option value=''>" + inival + "</option>";
            $.each(json, function(k, v) {
                option += "<option value='" + v.cod + "'>" + v.nombre.toUpperCase() + "</option>";
            });
            // console.log(option);
            $("#" + id).html(option);

        }
    });
}

function comboboxSelected(id, url, inival, data) {
    var localurl = url;
    $.ajax({
        url: localurl,
        type: "POST",
        jsonpCallback: id,
        dataType: "JSON",
        success: function(json) {
            var option = "<option value=''>" + inival + "</option>";
            $.each(json, function(k, v) {
                option += "<option value='" + v.cod + "'>" + v.nombre + "</option>";
            });
            // console.log(option);
            $("#" + id).html(option);

        },
        complete: function() {
            $("#" + id).val(data);
        }
    });
}

function comboboxEntrevista(id, url, inival, params) {
    var localurl = url;
    $.ajax({
        url: localurl,
        type: "POST",
        data: { params: params },
        jsonpCallback: id,
        dataType: "JSON",
        success: function(json) {
            if (json.length == 0) {
                var option = "<option value='10' selected>No aplica</option>";
            } else {
                var option = "<option value=''>" + inival + "</option>";
                $.each(json, function(k, v) {
                    option += "<option value='" + v.cod + "'>" + v.nombre + "</option>";
                });
            }
            // console.log(option);
            $("#" + id).html(option);

        }
    });
}

/*//////////////////////////////////////////////////////////////////////////////*/
function doSearch(val, table) {
    /*var tableReg = document.getElementById('table');*/
    var tableReg = document.getElementById("" + table);
    var searchText = $("#" + val).val().toLowerCase();
    /*var searchText = document.getElementById('buscar').value.toLowerCase();*/
    for (var i = 1; i < tableReg.rows.length; i++) {
        var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        var found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                found = true;
            }
        }
        if (found) {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}


/*//////////////////////////////////////////////////////////////////////////////*/
function realoadTable(id, url) {
    // $('#'+id).DataTable().ajax.url(url).load();
    $('#' + id).DataTable().ajax.url(url).reload();
}

/*//////////////////////////////////////////////////////////////////////////////*/
function calcular_edad(FechaNacimiento) {
    var fechaNace = new Date(FechaNacimiento);
    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

    return edad;
}