<?php
  include 'developer/var.php';
  include 'developer/security.php';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Barranquilla Verde - Proyecto de grado</title>
    <meta name="description" content="SisSalud - Puerto Colombia">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php url('assets/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/themify-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/selectFX/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/jqvmap/dist/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/selectFX/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>">

    <link rel="stylesheet" href="<?php url('assets/css/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/css/bootstrap-select.min.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="<?php url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>

    <script src="<?php url('assets/plugins/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php url('assets/js/bootbox.min.js'); ?>"></script>
    
    <!-- <script src="<?php url('assets/js/main.js'); ?>"></script> -->
    <script src="<?php url('assets/js/functions.js'); ?>"></script>

    <!-- <script src="<?php url('assets/plugins/chart.js/dist/Chart.bundle.min.js'); ?>"></script> -->
    <!-- <script src="<?php url('assets/js/dashboard.js'); ?>"></script> -->
    <!-- <script src="<?php url('assets/js/widgets.js'); ?>"></script> -->
    <!-- <script src="<?php url('assets/plugins/jqvmap/dist/jquery.vmap.min.js'); ?>"></script> -->
    <!-- <script src="<?php url('assets/plugins/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script> -->
    <!-- <script src="<?php url('assets/plugins/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script> -->
    <script src="<?php url('assets/js/toastr.min.js'); ?>"></script>
    <script src="<?php url('assets/js/bootstrap-select.min.js'); ?>"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHdFVig_dTg63Mlf-_Q7EauMdOF01eJj0&libraries=places,visualization"></script>


    <!--JS Scripts-->
    <script>
        $(document).ready(function () {
          if(localStorage.paginaBQV){
            loadpag(localStorage.paginaBQV,localStorage.idpaginaBQV,localStorage.codsuppagBQV);
          }else{
            loadpag('../graficas.php',1);
          }
        });
    </script>

    <style>
        .nav.navbar-nav *{
            cursor: pointer;
        }
        .user-image {
            float: left;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: -2px;
            float: left;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: -10px;
        }
        .content{

        }
        .md {
            border: 1px solid rgba(0,0,0,.0625) !important;
        }
        .p-20 {
            margin-top: 10px !important;
            padding: 20px !important;
        }
    </style>

</head>

<body id="bb">
    
<div class="desactivarC" style="height: 100%;width: 100%;position: fixed;top: 0;left: 0;background: rgba(255,255,255,0.8); z-index: 999999;display:none;"><img src="<?php url('assets/images/loading.gif'); ?>" style="margin-left:50%; margin-top:300px;width: 60px;"><p style="width: 100%;text-align: center;color: #000;font-size: 18px;">Gestionando datos, por favor, espere...</p></div>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel md">
    </aside>
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
            <?php include 'component/header.php'; ?>
        <!-- /header -->
        
        <div id="contenido">
            
        </div>     
        
        <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    
    

</body>

</html>
