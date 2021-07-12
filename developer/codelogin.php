<?php
session_start();
// date_default_timezone_set('Pacific/Honolulu');
header('content-type: application/json; charset=utf-8');


require_once 'PDOConn.php';

if(isset($_GET['case'])){
    $case=$_GET['case'];
}

// VARIABLE Login
if(isset($_POST['usuario'])){
  $usuario = strtolower(trim($_POST['usuario']));
}
if(isset($_POST['password'])){
  $password = strtolower(trim($_POST['password']));
}


switch ($case) {

    /************************  procesos para login.php ****************************/
    case 'iniciarsesion':
      
      $select = "SELECT us.id_us, us.email, us.pass, us.estado, us.name_complete, us.foto, us.estado, pf.codigo_perfil, pf.nombre_perfil, ro.codigo_rol, ro.nombre_rol FROM usuarios us
                  INNER JOIN perfiles pf ON pf.codigo_perfil = codperfil_fk 
                  INNER JOIN roles ro ON ro.codigo_rol = pf.codrol_fk
                  WHERE us.email = :usuario";
      $params = array(':usuario' => $usuario);
      $row = row($select,$params);

      if($row != ''){
      	if($row['pass']==sha1($password)){

      		if($row['estado']=='on'){
      			$_SESSION['BQV_session'] = true;
      			$_SESSION['BQV_codigo_usu']=$row['id_us'];
            $_SESSION['BQV_usuario']=$row['email'];
      			$_SESSION['BQV_nombre_usu']=$row['name_complete'];
      			$_SESSION['BQV_codperfil']=$row['codigo_perfil'];
      			$_SESSION['BQV_nombre_perfil']=$row['nombre_perfil'];
            $_SESSION['BQV_foto']=$row['foto'];

            $_SESSION['BQV_codrol']=$row['codigo_rol'];
            $_SESSION['BQV_nombre_rol']=$row['nombre_rol'];

	      		$json=json_encode(array("success"=>true));
	      	}else{
	      		$json=json_encode(array("success"=>false,'mensaje' => "Error: Usuario deshabilitado"));
	      	}
      	}else{

      		$json=json_encode(array("success"=>false,'mensaje' => "Error: Usuario y Contraseña no coinciden"));
      	}
      }else{
        $json=json_encode(array("success"=>false,'mensaje' => "Error: Usuario inexistente "));
      }

    break;

}
echo $json;

?>

