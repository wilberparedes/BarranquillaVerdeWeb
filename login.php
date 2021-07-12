<?php
    session_start();
	if(isset($_SESSION["BQV_session"])){
        header("Location: ../dashboard/");
	}
    include 'developer/var.php';
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
    <title>Barranquilla Verde</title>
    <meta name="description" content="Barranquilla Verde">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?php url('assets/plugins/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/themify-icons/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/plugins/selectFX/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/css/toastr.min.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark" style="background: url(<?php url('assets/images/login-background.jpg'); ?>) no-repeat center top;background-size: cover;background-position: initial;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="./">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <div  style="text-align:center">
                        <img src="<?php url('assets/images/logo.png'); ?>" style="width: 250px"/>
                    </div>
                    <form id="frmLogin"  method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="abc@email.com">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="***************">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div> -->
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php url('assets/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- <script src="<?php url('assets/js/main.js'); ?>"></script> -->
    <script src="<?php url('assets/js/toastr.min.js'); ?>"></script>

    <script>
  
        $("#frmLogin").submit(function( event ) {
            event.preventDefault();
            var usuario = $("#txtUsuario").val();
            var password = $("#txtPassword").val();
            if($.trim(usuario) == ''){
                toastr.warning('Por favor, ingrese Usuario.');
                $("#txtUsuario").focus();
            }else if($.trim(password) == ''){

                toastr.warning('Por favor, ingrese Contraseña.');
                $("#txtPassword").focus();
            }else{
                $.ajax({
                    url : "<?php url('cLogin/iniciarsesion'); ?>",
                    type : "POST",
                    data : {
                        'usuario' : usuario,
                        'password' : password
                    },
                    dataType : "JSON",
                    success : function (json){
                        if(json.success == true){
                            toastr.success("Logueado exitosamente!");
                            window.location='../dashboard/';
                        }else{
                            toastr.error(json.mensaje);
                        }
                    }
                });
            }
        });
        
    </script>

</body>

</html>
