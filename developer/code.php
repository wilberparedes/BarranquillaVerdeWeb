<?php
set_time_limit(0);
session_start();

header('content-type: application/json; charset=utf-8');

require_once 'var.php';
require_once 'PDOConn.php';

// require("phpmailer/class.phpmailer.php");
// require("phpmailer/class.smtp.php");
// require("PHPExcel/PHPExcel.php");

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPAuth = true;
// $mail->SMTPKeepAlive = true;
// $mail->SMTPSecure = "tls";
// $mail->SMTPDebug  = 0;
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 587;
// $mail->Username = "user";
// $mail->Password = "contra";
// $mail->SetFrom('user', 'user name');

// $mail->Subject = utf8_decode("subject");
// $mail->AltBody = "";

if(isset($_POST['documento'])){
    $documento = $_POST['documento'];
}

if(isset($_GET['case'])){
    $case=$_GET['case'];
}
if(isset($_GET['estado'])){
    $estado=$_GET['estado'];
}

// VARIABLE menu
if(isset($_POST['codmenu'])){
  $codmenu = $_POST['codmenu'];
}
if(isset($_POST['icono'])){
  $icono_menu = trim($_POST['icono']);
}
if(isset($_POST['nombre_menu'])){
  $nombre_menu = ucfirst(strtolower(trim($_POST['nombre_menu'])));
}
if(isset($_POST['nivel'])){
  $nivel_menu = $_POST['nivel'];
}
if(isset($_POST['link'])){
  $link_menu = strtolower($_POST['link']);
}
if(isset($_POST['padre'])){
  $padre_menu = $_POST['padre'];
}
if(isset($_POST['estado'])){
  $estado_menu = $_POST['estado'];
}
// variables para busqueda
if(isset($_GET['nombre_menu'])){
  $nombre_menu = ucfirst(strtolower(trim($_GET['nombre_menu'])));
}
if(isset($_GET['nivel'])){
  $nivel_menu = $_GET['nivel'];
}
if(isset($_GET['padre'])){
  $padre_menu = $_GET['padre'];
}
// FIN VARIABLE MENU


//variables perfiles
if(isset($_POST['codperfil'])){
  $codperfil = $_POST['codperfil'];
}
if(isset($_POST['nombre_perfil'])){
  $nombre_perfil = trim($_POST['nombre_perfil']);
}
if(isset($_POST['rol'])){
  $rol_perfil = $_POST['rol'];
}
if(isset($_POST['descripcion_perfil'])){
  $descripcion_perfil = $_POST['descripcion_perfil'];
}
if(isset($_POST['estado_perfil'])){
  $estado_perfil = $_POST['estado_perfil'];
}
// FIN VARIABLE PERFILES

//-------------------
//VARIABLES ASIGNARMENU PERFILES
if(isset($_POST['codrol'])){
  $codrol = $_POST['codrol'];
}
if(isset($_POST['menus'])){
  $menus = $_POST['menus'];
}

// variables para mi perfil
if(isset($_GET['nombphoto'])){
  $nombphoto = $_GET['nombphoto'];
}
if(isset($_POST['identificacion'])){
  $identificacion = trim($_POST['identificacion']);
}
if(isset($_POST['nombre'])){
  $nombre = trim($_POST['nombre']);
}
if(isset($_POST['apellido'])){
  $apellido = trim($_POST['apellido']);
}
if(isset($_POST['direccion'])){
  $direccion = trim($_POST['direccion']);
}
if(isset($_POST['celular'])){
  $celular = trim($_POST['celular']);
}
if(isset($_POST['contraActual'])){
  $contraActual = $_POST['contraActual'];
}
if(isset($_POST['nuevaContra'])){
  $nuevaContra = $_POST['nuevaContra'];
}
// variables 


// variables clientes.php
if(isset($_POST['codusuario'])){
  $codusuario = $_POST['codusuario'];
}
if(isset($_POST['estado'])){
    $estado=$_POST['estado'];
}



// variables email.php
if(isset($_POST['pass'])){
  $pass = $_POST['pass'];
}

// variables rol
if(isset($_POST['nombre_rol'])){
  $nombre_rol = trim($_POST['nombre_rol']);
}
if(isset($_POST['estado_rol'])){
  $estado_rol = $_POST['estado_rol'];
}   
if(isset($_POST['menus'])){
  $menus = $_POST['menus'];
} 


if(isset($_POST['codaspecto'])){
  $codaspecto = $_POST['codaspecto'];
} 

if(isset($_POST['nombre_aspecto'])){
  $nombreaspecto = mb_strtoupper(strtolower(trim($_POST["nombre_aspecto"])));
} 

if(isset($_GET['codtp'])){
  $codtp = $_GET['codtp'];
}

//variables departamento.php

if(isset($_POST["coddepartamento"])){
  $coddepartamento = $_POST["coddepartamento"];
}
if(isset($_GET["coddepartamento"])){
  $coddepartamento = $_GET["coddepartamento"];
}
if(isset($_POST["nombre_departamento"])){
  $nombredepartamento = trim($_POST["nombre_departamento"]);
}
if(isset($_GET["nombredepartamento"])){
  $nombredepartamento = trim($_GET["nombredepartamento"]);
}


//variables municipio.php

if(isset($_POST["codmunicipio"])){
  $codmunicipio = $_POST["codmunicipio"];
}
if(isset($_POST["nombre_municipio"])){
  $nombre_municipio = trim($_POST["nombre_municipio"]);
}

// VARIABLES CENSO.PHP
if(isset($_GET["codsector"])){
  $codsector = $_GET["codsector"];
}


//VARIABLES EVENTOS.PHP
if(isset($_POST["codevento"])){
  $codevento = $_POST["codevento"];
}
if(isset($_POST["nombreevento"])){
  $nombreevento = mb_strtoupper(strtolower(trim($_POST["nombreevento"])));
}
if(isset($_POST["nivelalerta"])){
  $nivelalerta = $_POST["nivelalerta"];
}
if(isset($_POST["estadoevento"])){
  $estadoevento = $_POST["estadoevento"];
}


//VARIABLES SINTOMAS.PHP
if(isset($_POST["codsintoma"])){
  $codsintoma = $_POST["codsintoma"];
}
if(isset($_POST["nombresin"])){
  $nombresin = ucwords(strtolower(trim($_POST["nombresin"])));
}
if(isset($_POST["estadosin"])){
  $estadosin = trim($_POST["estadosin"]);
}


//VARIABLES EPS.PHP
if(isset($_POST["codeps"])){
  $codeps = $_POST["codeps"];
}
if(isset($_POST["nombreeps"])){
  $nombreeps = ucwords(strtolower(trim($_POST["nombreeps"])));
}
if(isset($_POST["estadoeps"])){
  $estadoeps = trim($_POST["estadoeps"]);
}

//VARIABLES SECTORES.PHP
if(isset($_POST["codsec"])){
  $codsec = $_POST["codsec"];
}
if(isset($_POST["nombresec"])){
  $nombresec = mb_strtoupper(strtolower(trim($_POST["nombresec"])));
}
if(isset($_POST["estadosec"])){
  $estadosec = trim($_POST["estadosec"]);
}

// VARIABLES BARRIOS.PHP
if(isset($_POST["codbarrio"])){
  $codbarrio = $_POST["codbarrio"];
}
if(isset($_POST["nombreba"])){
  $nombreba = mb_strtoupper(strtolower(trim($_POST["nombreba"])));
}
if(isset($_POST["estadoba"])){
  $estadoba = trim($_POST["estadoba"]);
}

// VARIABLES MORBILIDADES.PHP
if(isset($_POST["codmor"])){
  $codmor = $_POST["codmor"];
}
if(isset($_POST["nombremor"])){
  $nombremor = mb_strtoupper(strtolower(trim($_POST["nombremor"])));
}
if(isset($_POST["estadomor"])){
  $estadomor = trim($_POST["estadomor"]);
}

// VARIABLES USUARIOS.PHP
if(isset($_POST["codusuario"])){
  $codusuario = $_POST["codusuario"];
}
if(isset($_POST["nombreusuario"])){
  $nombreusuario = $_POST["nombreusuario"];
}
if(isset($_POST["email"])){
  $email = $_POST["email"];
}
if(isset($_POST["contra"])){
  $contra = trim($_POST["contra"]);
}
if(isset($_POST["perfil"])){
  $perfil = $_POST["perfil"];
}
if(isset($_POST["estado"])){
  $estado = $_POST["estado"];
}

$createtable = array(
  'data' => array()
);

switch ($case) {

    case 'loadPerfiles2':
      $sql = "SELECT codperfil as cod, nombre_perfil as nombre, estado_perfil FROM perfil2 WHERE estado_perfil = 'on'";
      $table = table($sql);
      $json = json_encode($table);
    break;

  /************************ procesos para miperfil.php **************************/

    case 'uploadFotoPerfil':
      if($_FILES['img-perfil']['tmp_name']!=""){
          $file=$_FILES["img-perfil"]['name'];
          $extension= explode(".",$file) ;
          $url="../assets/fotoperfil/".$_GET['nombphoto'].".".$extension[1];                       
          $urlFoto='assets/fotoperfil/'.$_GET['nombphoto'].".".$extension[1];

        if (move_uploaded_file($_FILES['img-perfil']['tmp_name'],$url)) {
          $sql="UPDATE usuarios SET foto='". $urlFoto."' WHERE id_us='".$_SESSION['SAEP_codigo_usu']."'"; 
          query($sql);
          $_SESSION['SAEP_foto']=$urlFoto;
          $json = json_encode(array("success" => true, "mensaje"=>"Foto de perfil actualizada exitosamente.")); 
        }

      }else{
        $json = json_encode(array("success" =>false,"message"=>"Campo vacio"));
      }
    break;

    case 'editUsuario':
      $update = "UPDATE usuarios SET nombre_usu = :nombre WHERE id_us = :codusu";
      $params = array(':nombre' => $nombre, ':codusu'=>$_SESSION["SAEP_codigo_usu"]);

      if(query($update, $params)){

        $_SESSION['SAEP_nombre_usu']=$nombre;
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }
    break;

    case 'editContrasena':
      $select = "SELECT * FROM usuarios WHERE id_us = :codusuario";
      $paramsselect = array(':codusuario' => $_SESSION["SAEP_codigo_usu"]);
      $row = row($select,$paramsselect);

      if($row != ''){
        if($row['pass']==sha1($contraActual)){
          $update = "UPDATE usuarios SET pass = :pass WHERE id_us = :codusuario";
          $params = array(':pass'=> sha1($nuevaContra), ':codusuario'=>$_SESSION["SAEP_codigo_usu"]);

          if(query($update, $params)){
            $json = json_encode(array("success"=>true));
          }else{
            $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
          }
        }else{
          $json = json_encode(array("success"=>false,"mensaje" => "La contraseña actual ingresada no es correcta"));
        }
      }
    break;
    
  /************************  FIN procesos para miperfil.php ****************************/


  /************************  procesos para gestionarmenu.php ****************************/
    case 'loadMenu':
      $sql = "SELECT codigo_menu, imagen, nombre_menu, nivel, orden, codsuperior, link, estado, target FROM menu WHERE estado = :estado ORDER BY codigo_menu ASC";
      $params = array(':estado' => 'on');

      $table = table($sql, $params);
      $i = 1;
      foreach ($table as $datarow => $data) {

        $icono = '<i class="fa '.$data["imagen"].'"></i>';

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Menú" onclick="fmodalEditar('.$data["codigo_menu"].', \''.$data["imagen"].'\',  \''.$data["nombre_menu"].'\', \''.$data["link"].'\', \''.$data["estado"].'\')"><i class="fa fa-edit"></i></a>';

        if($data["codsuperior"] == 0){
          $codsuperior = 'Sin menú superior';
        } else{
          $row = row("SELECT nombre_menu, imagen FROM menu WHERE codigo_menu = :codmenu", array(':codmenu' => $data["codsuperior"]));
          $codsuperior = '<b><i class="fa '.$row["imagen"].'"></i> '.$row["nombre_menu"].'</b>';
        }

        $estado = ($data["estado"] == 'on') ? 'Habilitado' : 'Inhabilitado';

        $options = $edit;
          
        array_push($createtable['data'], array($i, $icono, $data["nombre_menu"],$data["nivel"],$data["orden"], $codsuperior, $data["link"], $estado, $options));

        $i++;

      }
      $json = json_encode($createtable);
    break;

    case 'buscarMenu':
      // estado = :estado AND
      $where ="";
      if($nivel_menu != ''){
        $where .= " AND nivel = ".$nivel_menu;
      }
      if($padre_menu != ''){
        $where .= " AND codsuperior = ".$padre_menu;
      }

      $sql = "SELECT codigo_menu, imagen, nombre_menu, nivel, orden, codsuperior, link, estado, target FROM menu WHERE nombre_menu LIKE '%".$nombre_menu."%' ".$where." ORDER BY codigo_menu ASC";
      // $params = array(':nombre_menu' => $nombre_menu1 );

      $table = table($sql);
      $i = 1;
      foreach ($table as $datarow => $data) {

        $icono = '<i class="fa '.$data["imagen"].'"></i>';

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Menú" onclick="fmodalEditar('.$data["codigo_menu"].', \''.$data["imagen"].'\',  \''.$data["nombre_menu"].'\', \''.$data["link"].'\', \''.$data["estado"].'\')"><i class="fa fa-edit"></i></a>';

        if($data["codsuperior"] == 0){
          $codsuperior = 'Sin menú superior';
        } else{
          $row = row("SELECT nombre_menu, imagen FROM menu WHERE codigo_menu = :codmenu", array(':codmenu' => $data["codsuperior"]));
          $codsuperior = '<b><i class="fa '.$row["imagen"].'"></i> '.$row["nombre_menu"].'</b>';
        }

        $options = $edit;

        $estado = ($data["estado"] == 'on') ? 'Habilitado' : 'Inhabilitado';
          
        array_push($createtable['data'], array($i, $icono, $data["nombre_menu"],$data["nivel"],$data["orden"], $codsuperior, $data["link"], $estado, $options));

        $i++;

      }
      $json = json_encode($createtable);
    break;

    case 'loadPadresMenu':
      $sql = "SELECT codigo_menu, nombre_menu, nivel, orden, codsuperior, link, imagen, target, estado FROM menu WHERE estado = :estado AND nivel = :nivel ORDER BY orden ASC";
      $params = array(':nivel'=>'1', ':estado' => 'on');

      $table = table($sql, $params);

      if(count($table)>=1){
        $json = json_encode(array("success"=>true,"menu" =>$table));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No hay Menú disponibles"));
      }
    break;

    case 'insertItemMenu':

      if($nivel_menu == '1'){
        $select = "SELECT max(orden) as \"nivelmax\" FROM menu WHERE nivel = :nivel";
        $params = array(':nivel' =>  $nivel_menu);
        $row = row($select,$params);
        if($row == ''){
          $orden = 1;
        }else{
          $orden = ($row["nivelmax"] + 1);
        }

        $insert = "INSERT INTO menu (nombre_menu, nivel, orden, codsuperior, link, imagen, target, estado) VALUES (:nombre_menu, :nivel, :orden, :codsuperior, :link, :imagen, :target, :estado)";
        $paramsInsert = array(
                              ':nombre_menu' => $nombre_menu,
                              ':nivel' => $nivel_menu, 
                              ':orden' => $orden, 
                              ':codsuperior' => 0, 
                              ':link' => $link_menu, 
                              ':imagen' => $icono_menu, 
                              ':target' => '_self', 
                              ':estado' => $estado_menu
                            );
        
        if(query($insert, $paramsInsert)){
          $json = json_encode(array("success"=>true,"orden" =>$orden));
        }else{
          $json = json_encode(array("success"=>false,"mensaje" => "Error al insertar Item para el Menú"));
        }
      }else if($nivel_menu == '2'){
        $select = "SELECT max(orden) as \"nivelmax\" FROM menu WHERE nivel = :nivel AND codsuperior = :codsuperior";
        $params = array(':nivel' =>  $nivel_menu, ':codsuperior' => $padre_menu );
        $row = row($select,$params);
        $orden = ($row["nivelmax"] + 1);

        $insert = "INSERT INTO menu (nombre_menu, nivel, orden, codsuperior, link, imagen, target, estado) VALUES (:nombre_menu, :nivel, :orden, :codsuperior, :link, :imagen, :target, :estado)";
        $paramsInsert = array(
                              ':nombre_menu' => $nombre_menu,
                              ':nivel' => $nivel_menu, 
                              ':orden' => $orden, 
                              ':codsuperior' => $padre_menu, 
                              ':link' => $link_menu, 
                              ':imagen' => $icono_menu, 
                              ':target' => '_self', 
                              ':estado' => $estado_menu
                            );
        if(query($insert, $paramsInsert)){
          $json = json_encode(array("success"=>true,"orden" =>$orden));
        }else{
          $json = json_encode(array("success"=>false,"mensaje" => "Error al insertar Item para el Menú"));
        }
      }
    break;

    case 'editItemMenu':
      $update = "UPDATE menu SET imagen = :imagen, nombre_menu = :nombre_menu, link = :link_menu, estado = :estado WHERE codigo_menu = :codmenu";
      $params = array(':imagen' => $icono_menu, ':nombre_menu' => $nombre_menu, ':link_menu' => $link_menu, ':estado' => $estado_menu, ':codmenu'=>$codmenu);

      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }
    break;
  /************************  FIN procesos para gestionarmenu.php ****************************/

  /************************  procesos para gestionarperfiles.php ****************************/
    case 'loadPerfiles':
      $sql = "SELECT p.codigo_perfil, p.nombre_perfil, p.descripcion, p.estado_perfil, r.codigo_rol, r.nombre_rol, r.menus
              FROM perfiles p
              INNER JOIN roles r ON r.codigo_rol = p.codrol_fk
              ORDER BY p.codigo_perfil ASC";

      $table = table($sql);
      $i = 1;
      foreach ($table as $datarow => $data) {

        $estado = ($data["estado_perfil"] == 'on') ? 'Habilitado' : 'Inhabilitado';

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Perfil" onclick="fmodalEditar('.$data["codigo_perfil"].', '.$data["codigo_rol"].', \''.$data["nombre_perfil"].'\', \''.$data["descripcion"].'\', \''.$data["estado_perfil"].'\')"><i class="fa fa-edit"></i></a>';
        $options = $edit;
          
        array_push($createtable['data'], array($i, $data["nombre_perfil"], $data["nombre_rol"], $data["descripcion"], $estado, $options));

        $i++;

      }
      $json = json_encode($createtable);
    break;

    case 'editItemPerfil':
      $update = "UPDATE perfiles SET nombre_perfil = :nombre_perfil, codrol_fk = :codrol, descripcion = :descripcion, estado_perfil = :estado WHERE codigo_perfil = :codperfil";
      $params = array(':nombre_perfil' => $nombre_perfil, ':codrol' => $rol_perfil, ':descripcion' => $descripcion_perfil, ':estado' => $estado_perfil, ':codperfil'=>$codperfil);

      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }
    break;

    case 'loadRol':

      $sql = "SELECT codigo_rol as cod, nombre_rol as nombre, menus, estado_rol FROM roles WHERE estado_rol = 'on'";
      $table = table($sql);
      $json = json_encode($table);

    break;

    case 'loadPerfilesSelect':
      
      $sql = "SELECT codigo_perfil as cod, nombre_perfil as nombre FROM perfiles WHERE estado_perfil = 'on'";
      $table = table($sql);
      $json = json_encode($table);

    break;

    case 'insertItemPerfil':

      $insert = "INSERT INTO perfiles (nombre_perfil, codrol_fk, descripcion, estado_perfil) VALUES (:nombre_perfil, :rol, :descripcion, :estado)";
      $paramsInsert = array(
                            ':nombre_perfil' => $nombre_perfil,
                            ':rol' => $rol_perfil, 
                            ':descripcion' => $descripcion_perfil,
                            ':estado' => $estado_perfil
                          );
      if(query($insert, $paramsInsert)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "Error al insertar Item de Perfil"));
      }

    break;
  /************************  FIN procesos para gestionarmenu.php ****************************/

  /************************  procesos para asignarmenuperfiles.php ****************************/
    case 'loadmodulos':
      $sqlmenu = "SELECT codigo_menu, nombre_menu, nivel,codsuperior FROM menu WHERE link!='#' AND estado=:estado order by codigo_menu asc";
      $tablemenu = table($sqlmenu, array( ':estado' => 'on'));

      $sqlrolesmenu = "SELECT menus FROM roles WHERE codigo_rol=:codrol AND estado_rol=:estado";
      $rowrolesmenu = row($sqlrolesmenu, array(':codrol'=>$codrol, ':estado' => 'on'));
      $modulos = explode(",",$rowrolesmenu['menus']);

      $asignados = array();
      $noasignados = array();

      foreach ($tablemenu as $datarowmenu => $datamenu) {
        $pos = in_array($datamenu['codigo_menu'], $modulos);
        if($pos === false){
          array_push($noasignados, array('nombre_menu'=>$datamenu['nombre_menu'], 'codmenu'=>$datamenu['codigo_menu'],'nivel'=>$datamenu['nivel'],'codsuperior'=>$datamenu['codsuperior']));
        }else{
          array_push($asignados, array('nombre_menu'=>$datamenu['nombre_menu'], 'codmenu'=>$datamenu['codigo_menu'],'nivel'=>$datamenu['nivel'],'codsuperior'=>$datamenu['codsuperior']));
        }
      }

      $json = json_encode(array("success"=>true, 'asignados'=>$asignados, 'noasignados'=>$noasignados));
    break;

    case 'updateConfigRolmenu':
      
      $update = "UPDATE roles SET menus = :menus WHERE codigo_rol = :codrol";
      $params = array(':menus' => $menus, ':codrol'=>$codrol);

      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }

    break;
  /************************  FIN procesos para asignarmenuperfiles.php ****************************/


  /************************  procesos para gestionarrol.php ****************************/
    case 'loadRolTable':
      $sql = "SELECT codigo_rol, nombre_rol, menus, estado_rol
              FROM roles ORDER BY codigo_rol ASC";
      // WHERE p.estado = :estado$params = array(':estado' => 'on');

      $table = table($sql);//, $params
      $i = 1;
      foreach ($table as $datarow => $data) {

        $estado = ($data["estado_rol"] == 'on') ? 'Habilitado' : 'Inhabilitado ';

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Rol" onclick="fmodalEditar('.$data["codigo_rol"].', \''.$data["nombre_rol"].'\', \''.$data["menus"].'\', \''.$data["estado_rol"].'\')"><i class="fa fa-edit"></i></a>';
        $options = $edit;
          
        array_push($createtable['data'], array($i, $data["nombre_rol"], $data["menus"], $estado, $options));

        $i++;

      }
      $json = json_encode($createtable);
    break;

    case 'editItemRol':
      $update = "UPDATE roles SET nombre_rol = :nombre_rol, estado_rol = :estado WHERE codigo_rol = :codrol";
      $params = array(':nombre_rol' => $nombre_rol, ':estado' => $estado_rol, ':codrol' => $codrol);

      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }
    break;

    case 'loadRol':
      $sql = "SELECT codigo_rol as cod, nombre_rol as nombre, menus, estado_rol FROM roles WHERE estado_rol = 'on'";
      // $params = array(':estado' => $estado_rol);,$params

      $table = table($sql);

      $json = json_encode($table);
    break;

    case 'insertItemRol':

        $insert = "INSERT INTO roles (nombre_rol, estado_rol) VALUES (:nombre_rol, :estado_rol)";
        $paramsInsert = array(
                              ':nombre_rol' => $nombre_rol,
                              ':estado_rol' => $estado_rol
                            );
        if(query($insert, $paramsInsert)){
          $json = json_encode(array("success"=>true));
        }else{
          $json = json_encode(array("success"=>false,"mensaje" => "Error al insertar Item de Rol"));
        }
    break;
  /************************  FIN procesos para gestionarrol.php ****************************/


  /************************  procesos para eps.php ****************************/
    case 'loadEpsTable':
      $sql = "SELECT codigo_eps, nombre_eps, estado_eps
              FROM eps ORDER BY codigo_eps ASC";

      $table = table($sql);
      $i = 1;
      foreach ($table as $datarow => $data) {

        $estado = ($data["estado_eps"] == 'on') ? 'Habilitado' : 'Inhabilitado ';

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar Rol" onclick="fmodalEditar('.$data["codigo_eps"].', \''.$data["nombre_eps"].'\', \''.$data["estado_eps"].'\')"><i class="fa fa-edit"></i></a>';
        $options = $edit;
          
        array_push($createtable['data'], array($i, $data["nombre_eps"], $estado, $options));

        $i++;

      }
      $json = json_encode($createtable);
    break;


    case 'editItemEps':

      $update = "UPDATE eps SET nombre_eps = :nombreeps, estado_eps = :estadoeps WHERE codigo_eps = :codeps";
      $params = array(':nombreeps' => $nombreeps, ':estadoeps' => $estadoeps, ':codeps' => $codeps);

      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "No se Actualizó la información. Por favor, intentelo de nuevo"));
      }

    break;

    case 'insertItemEps':

      $insert = "INSERT INTO eps (nombre_eps, estado_eps) VALUES (:nombreeps, :estadoeps)";
      $paramsInsert = array(
                            ':nombreeps' => $nombreeps,
                            ':estadoeps' => $estadoeps
                          );
      if(query($insert, $paramsInsert)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"mensaje" => "Error al insertar Item"));
      }
    break;
  /************************  FIN procesos para eps.php ****************************/


  /************************  procesos censo.php code ****************************/
    case 'loadEventosEpide':
      $sql = "SELECT codigo_ee as cod, nombre_ee as nombre FROM eventos_epidemiologicos WHERE estado_ee = 'on' ORDER BY nombre_ee ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'loadMorbilidades':
      $sql = "SELECT codigo_mor as cod, nombre_mor as nombre FROM morbilidades WHERE estado_mor = 'on' AND codigo_mor != 1   ORDER BY nombre_mor ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;
     
    case 'loadLugarNacimiento':
      $sql = "SELECT codigo_ciu as cod, nombre_ciu as nombre FROM ciudades WHERE estado_ciu = 'on' ORDER BY nombre_ciu ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'bloadMorbilidades':
      $sql = "SELECT codigo_mor as cod, nombre_mor as nombre FROM morbilidades WHERE estado_mor = 'on' ORDER BY nombre_mor ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'loadEps':
      $sql = "SELECT codigo_eps as cod, nombre_eps as nombre FROM eps WHERE estado_eps = 'on' ORDER BY nombre_eps ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'loadSectores':
      $sql = "SELECT codigo_sec as cod, nombre_sec as nombre FROM sectores WHERE estado_sec = 'on' ORDER BY nombre_sec ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'loadBarrios':
      $sql = "SELECT codigo_ba as cod, nombre_ba as nombre FROM barrios WHERE codsector_fk = :codsector AND estado_ba = 'on' ORDER BY nombre_ba ASC";
      $table = table($sql, array(':codsector' => $codsector));
      $json = json_encode($table);
    break;

    case 'loadRegimenes':
      $sql = "SELECT codigo_rg as cod, nombre_rg as nombre FROM regimenes WHERE estado_rg = 'on' ORDER BY nombre_rg ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'loadTipoPoblacion':
      $sql = "SELECT codigo_tp as cod, nombre_tp as nombre FROM tipo_poblacion WHERE estado_tp = 'on' ORDER BY nombre_tp ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;

    case 'sLoadSintomas':
      $sql = "SELECT codigo_sin as cod, nombre_sin as nombre FROM sintomas WHERE estado_sin = 'on' ORDER BY codigo_sin ASC";
      $table = table($sql);
      $json = json_encode($table);
    break;
    
    case 'nuevoCenso':
      $inserCenso = "INSERT INTO ficha_censo (tipo_identificacion, num_identificacion, nombres, apellidos, telefono, direccion, ubicacion_gps, fecha_nacimiento, lugar_nacimiento, nacionalidad, pais_origen, permiso_ep, fecha_ingreso_pais, certif_migracion, codeventoepide_fk, cantidad_eventos, codeps_fk, estrato_economico, nucleo_familiar, servicios_publicos, codbarrio_fk, codregimen_fk, codtipopoblacion_fk, fecha_ingreso) 
                          VALUES (:tipoidentificacion, :numidentificacion, :nombres, :apellidos, :telefonos, :direccion, :ubicaciongps, :fechanacimiento, :lugarnacimiento, :nacionalidad, :paisorigen, :permisoep, :fechaingresopais, :certifmigracion, :codeventoepide, :cantidadeventos, :codeps, :estratoeconomico, :nucleofamiliar, :serviciospublicos, :codbarrio, :codregimen, :codtipopoblacion, :fechaingreso);";
      $paramsCenso = array(
        ':tipoidentificacion' => $_POST["sTipoDocumento"],
        ':numidentificacion' => $_POST["txtDocumento"],
        ':nombres' => $_POST["txtNombres"],
        ':apellidos' => $_POST["txtApellidos"],
        ':telefonos' => $_POST["txtTelefono"],
        ':direccion' => $_POST["txtTelefono"],
        ':ubicaciongps' => $_POST["lat"].','.$_POST["lng"],
        ':fechanacimiento' => $_POST["txtFechaNacimiento"],
        ':lugarnacimiento' => $_POST["sLugarNacimiento"],
        ':nacionalidad' => $_POST["sNacionalidad"],
        ':paisorigen' => ($_POST["txtPaisOrigen"] == '' ? NULL : $_POST["txtPaisOrigen"]),
        ':permisoep' => ($_POST["sPEP"] == '' ? NULL : $_POST["sPEP"]),
        ':fechaingresopais' => ($_POST["txtFechaIngresoPais"] == '' ? NULL : $_POST["txtFechaIngresoPais"]),
        ':certifmigracion' => ($_POST["sCertificadoMigracion"] == '' ? NULL : $_POST["sCertificadoMigracion"]),
        ':codeventoepide' => $_POST["sEventosEpide"],
        ':cantidadeventos' => $_POST["txtCantidadEventos"],
        ':codeps' => $_POST["sEps"],
        ':estratoeconomico' => $_POST["sEstrato"],
        ':nucleofamiliar' => $_POST["sNucleoFamiliar"],
        ':serviciospublicos' => $_POST["sNucleoFamiliar"],
        ':codbarrio' => $_POST["sBarrio"],
        ':codregimen' => $_POST["sRegimen"],
        ':codtipopoblacion' => $_POST["sTipoPoblacion"],
        ':fechaingreso' => datetimeNow()
      );

      if(query($inserCenso, $paramsCenso)){
        $json = json_encode(array('success' => true));
      }else{
        $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al guardar Censo'));
      }
      
    break;

    

    
    case 'nuevoCaso':
      if(isset($_POST["sServiciosPublicos"])){
        $sServiciosPublicos = implode(",", $_POST["sServiciosPublicos"]);
      }else{
        $sServiciosPublicos = NULL;
      }

      $insertCaso = "INSERT INTO casos (direccion, ubicacion_gps, codeventoepide_fk, codmorbilidad_fk, estrato_economico, nucleo_familiar, servicios_publicos, codbarrio_fk, fecha_ingreso, realizaprueba, fechaprueba, resultadoprueba, resultadopruebapcr, estado_caso) VALUES (:direccion, :ubicaciongps, :codeventoepide, :codmorbilidad, :estratoeconomico, :nucleofamiliar, :serviciospublicos, :codbarrio, :fechaingreso, :realizaprueba, :fechaprueba, :resultadoprueba, :resultadopruebapcr, :estadocaso)";
      $paramsCaso = array(
        ':direccion' => $_POST["direc"], 
        ':ubicaciongps' => $_POST["lat"].','.$_POST["lng"], 
        ':codeventoepide' => $_POST["sEventosEpide"], 
        ':codmorbilidad' => ($_POST["sMorbilidad"] == "" ? 1 : $_POST["sMorbilidad"]), 
        ':estratoeconomico' => $_POST["sEstrato"], 
        ':nucleofamiliar' => $_POST["sNucleoFamiliar"],
        ':serviciospublicos' => $sServiciosPublicos,
        ':codbarrio' => $_POST["sBarrio"],
        ':fechaingreso' => datetimeNow(),
        ':realizaprueba' => $_POST["sRealizaPrueba"], 
        ':fechaprueba' => ($_POST["sFechaPrueba"] != '' ? $_POST["sFechaPrueba"] : NULL), 
        ':resultadoprueba' => ($_POST["sResultadoPruebSerologica"] != '' ? $_POST["sResultadoPruebSerologica"] : NULL),
        ':resultadopruebapcr' => ($_POST["sResultadoPruebaPCR"] != '' ? $_POST["sResultadoPruebaPCR"] : NULL),
        // ':observaciones' => mb_strtoupper(strtolower($_POST["txaObservaciones"])),
        ':estadocaso' => $_POST["sEstadoCaso"]
        
      );
      $queryCaso = DataRowMySQL($insertCaso, $paramsCaso);
      if($queryCaso != -1){
        $insertPersona = "INSERT INTO personas (tipo_identificacion, num_identificacion, nombres, apellidos, telefono, fecha_nacimiento, edad, lugar_nacimiento, nacionalidad, pais_origen, fecha_ingreso_pais, cert_migracion, pep, codeps_fk, codregimen_fk, codtipopoblacion_fk, fecha_ingreso, codcaso_fk, sexo, ocupacion) VALUES (:tipoidentificacion, :numidentificacion, :nombres, :apellidos, :telefono, :fechanacimiento, :edad, :lugarnacimiento, :nacionalidad, :paisorigen, :fechaingresopais, :certmigracion, :pep, :codeps, :codregimen, :codtipopoblacion, :fechaingreso, :codcaso, :sexo, :ocupacion)";
        $paramsPersona = array(
          ':tipoidentificacion' =>  $_POST["sTipoDocumento"],
          ':numidentificacion' => $_POST["txtDocumento"],
          ':nombres' => mb_strtoupper(strtolower($_POST["txtNombres"])), 
          ':apellidos' => mb_strtoupper(strtolower($_POST["txtApellidos"])), 
          ':telefono' => $_POST["txtTelefono"],
          ':fechanacimiento' => $_POST["txtFechaNacimiento"],
          ':edad' => $_POST["txtEdad"],
          ':lugarnacimiento' => mb_strtoupper(strtolower($_POST["sLugarNacimiento"])),
          ':nacionalidad' => $_POST["sNacionalidad"],
          ':paisorigen' => ($_POST["txtPaisOrigen"] != '' ? mb_strtoupper (strtolower($_POST["txtPaisOrigen"])) : NULL),
          ':fechaingresopais' => ($_POST["txtFechaIngresoPais"] != '' ? $_POST["txtFechaIngresoPais"] : NULL),
          ':certmigracion' => ($_POST["sCertificadoMigracion"] != '' ? $_POST["sCertificadoMigracion"] : NULL),
          ':pep' => ($_POST["sPEP"] != '' ? $_POST["sPEP"] : NULL),
          ':codeps' => $_POST["sEps"],
          ':codregimen' => $_POST["sRegimen"],
          ':codtipopoblacion' => $_POST["sTipoPoblacion"],
          ':fechaingreso' => datetimeNow(),
          ':codcaso' => $queryCaso,
          ':sexo' => $_POST["sSexo"],
          ':ocupacion' => $_POST["sOcupacion"],
        );
        $queryPersona = DataRowMySQL($insertPersona, $paramsPersona);
        if($queryPersona != -1){

          $insertObservacion = "INSERT INTO observaciones_casos (codcaso_fk, codusuario_fk, descripcion_obc, fecha_obc) VALUES (:codcaso, :codusuario, :descripcion, :fecha)";
          $paramsObservacion = array(':codcaso' => $queryCaso, ':codusuario' => $_SESSION['BQV_codigo_usu'], ':descripcion' => mb_strtoupper(strtolower($_POST["txaObservaciones"])), ':fecha' => datetimeNow());
          $queryObservacion = DataRowMySQL($insertObservacion, $paramsObservacion);

          if($queryObservacion != -1){
            foreach ($_POST["sSintomas"] as $key => $value) {
              $insertSintomas = "INSERT INTO reporte_sintomas (codpersona_fk, codsintoma_fk) VALUES (:codpersona, :codsintoma)";
              $paramsSintomas = array(':codpersona' =>  $queryPersona, ':codsintoma' => $value);
              query($insertSintomas, $paramsSintomas);
            }
            $json = json_encode(array('success' => true));
          }else{
            $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al guardar Observación'));
          }

        }else{
          $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al guardar Persona'));
        }
      }else{
        $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al guardar Caso'));
      }
    break;

    case 'updateCenso':
      if(isset($_POST["sServiciosPublicos"])){
        $sServiciosPublicos = implode(",", $_POST["sServiciosPublicos"]);
      }else{
        $sServiciosPublicos = NULL;
      }
      $updateCaso = "UPDATE casos SET direccion = :direccion, ubicacion_gps = :ubicaciongps, codeventoepide_fk = :codeventoepide, codmorbilidad_fk = :codmorbilidad, estrato_economico = :estratoeconomico, nucleo_familiar = :nucleofamiliar, servicios_publicos = :serviciospublicos, codbarrio_fk = :codbarrio, realizaprueba = :realizaprueba, fechaprueba = :fechaprueba, resultadoprueba = :resultadoprueba, resultadopruebapcr = :resultadopruebapcr, fecha_act = :fechaact WHERE codigo_caso = :codigocaso";
      $paramsUpdateCaso = array(
                        ':direccion' => $_POST["direc"],
                        ':ubicaciongps' => $_POST["lat"].','.$_POST["lng"],
                        ':codeventoepide' =>  $_POST["sEventosEpide"],
                        ':codmorbilidad' => ($_POST["sMorbilidad"] == "" ? 1 : $_POST["sMorbilidad"]), 
                        ':estratoeconomico' => $_POST["sEstrato"],
                        ':nucleofamiliar' => $_POST["sNucleoFamiliar"],
                        ':serviciospublicos'  => $sServiciosPublicos,
                        ':codbarrio' =>  $_POST["sBarrio"],
                        ':realizaprueba' => $_POST["sRealizaPrueba"], 
                        ':fechaprueba' => ($_POST["sFechaPrueba"] != '' ? $_POST["sFechaPrueba"] : NULL), 
                        ':resultadoprueba' => ($_POST["sResultadoPruebSerologica"] != '' ? $_POST["sResultadoPruebSerologica"] : NULL),
                        ':resultadopruebapcr' => ($_POST["sResultadoPruebaPCR"] != '' ? $_POST["sResultadoPruebaPCR"] : NULL),
                        ':fechaact' => datetimeNow(),
                        ':codigocaso' => $_POST["codcaso"]
                        
                      );
      if(query($updateCaso, $paramsUpdateCaso)){

        $updatePersonas = "UPDATE personas SET tipo_identificacion = :tipoidentificacion, num_identificacion = :numidentificacion, nombres = :nombres, apellidos = :apellidos, telefono = :telefono, fecha_nacimiento = :fechanacimiento, edad = :edad, lugar_nacimiento = :lugarnacimiento, nacionalidad = :nacionalidad, pais_origen = :paisorigen, fecha_ingreso_pais = :fechaingresopais, cert_migracion = :certmigracion, pep = :pep, codeps_fk = :codeps, codregimen_fk = :codregimen, codtipopoblacion_fk = :codtipopoblacion, fecha_act = :fechaact, sexo = :sexo, ocupacion = :ocupacion WHERE codigo_per = :codpersona";
        $paramsUpdatePersonas = array(
          ':tipoidentificacion' =>  $_POST["sTipoDocumento"],
          ':numidentificacion' => $_POST["txtDocumento"],
          ':nombres' => $_POST["txtNombres"],
          ':apellidos' => $_POST["txtApellidos"],
          ':telefono' => $_POST["txtTelefono"],
          ':fechanacimiento' => $_POST["txtFechaNacimiento"],
          ':edad' =>  $_POST["txtEdad"],
          ':lugarnacimiento' => $_POST["sLugarNacimiento"],
          ':nacionalidad' => $_POST["sNacionalidad"],
          ':paisorigen' => ($_POST["txtPaisOrigen"] != '' ? $_POST["txtPaisOrigen"] : NULL),
          ':fechaingresopais' => ($_POST["txtFechaIngresoPais"] != '' ? $_POST["txtFechaIngresoPais"] : NULL),
          ':certmigracion' => ($_POST["sCertificadoMigracion"] != '' ? $_POST["sCertificadoMigracion"] : NULL),
          ':pep' => ($_POST["sPEP"] != '' ? $_POST["sPEP"] : NULL),
          ':codeps' => $_POST["sEps"],
          ':codregimen' => $_POST["sRegimen"],
          ':codtipopoblacion' => $_POST["sTipoPoblacion"],
          ':fechaact' =>  datetimeNow(),
          ':sexo' => $_POST["sSexo"],
          ':ocupacion' => $_POST["sOcupacion"],
          ':codpersona' => $_POST["codpersona"]
        );
        if(query($updatePersonas, $paramsUpdatePersonas)){
          query("DELETE FROM reporte_sintomas WHERE codpersona_fk = :codpersona", array(':codpersona' => $_POST["codpersona"]));
          foreach ($_POST["sSintomas"] as $key => $value) {
            $insertSintomas = "INSERT INTO reporte_sintomas (codpersona_fk, codsintoma_fk) VALUES (:codpersona, :codsintoma)";
            $paramsSintomas = array(':codpersona' => $_POST["codpersona"], ':codsintoma' => $value);
            query($insertSintomas, $paramsSintomas);
          }
          
          $json = json_encode(array('success' => true));
        }else{
          $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al actualizar Persona'));
        }
      }else{
        $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al actualizar Caso'));
      }
    break;

    case 'updateEstadoCaso':
      $updateCaso = "UPDATE casos SET estado_caso = :estado, estado_paciente = :estadopaciente, fecha_act = :fechaact WHERE codigo_caso = :codigocaso";
      $paramsUpdateCaso = array(
                        ':estado' => $_POST["estado"],
                        ':estadopaciente' => (isset($_POST["estadopaciente"]) ? $_POST["estadopaciente"] : NULL),
                        ':fechaact' => datetimeNow(),
                        ':codigocaso' => $_POST["codcaso"]
                      );
      if(query($updateCaso, $paramsUpdateCaso)){
        $json = json_encode(array('success' => true));
      }else{
        $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al actualizar Caso'));
      }
    break;

    case 'detalleCaso':
      $personas = array();
      $sql = "SELECT c.codigo_caso AS codigo, direccion, c.`estrato_economico` AS estrato, c.`nucleo_familiar` AS nucleofamiliar, c.`servicios_publicos` AS serviciospublicos, c.codeventoepide_fk AS codeventoepide, c.ubicacion_gps as geoposicion, c.codmorbilidad_fk AS codmorbilidad, c.codbarrio_fk AS codbarrio, ba.`nombre_ba` AS barrio, se.codigo_sec as codsector, se.`nombre_sec` AS sector, realizaprueba, fechaprueba, resultadoprueba, resultadopruebapcr,  estado_caso AS estadocaso, estado_paciente estadopaciente
                FROM casos c
                INNER JOIN barrios ba ON ba.`codigo_ba` = c.`codbarrio_fk`
                INNER JOIN sectores se ON se.`codigo_sec` = ba.`codsector_fk`
                WHERE codigo_caso = :id";
      $params = array(':id' => $_POST["id"]);
      $rowCaso = row($sql, $params);

      $sqlPersonas = "SELECT codigo_per AS codpersona, p.tipo_identificacion AS tipoidentificacion, p.`num_identificacion` AS numidentificacion, p.codigo_per, p.`nombres`, p.`apellidos`, p.`telefono`, p.`fecha_nacimiento` AS fechanacimiento, p.`lugar_nacimiento` AS lugarnacimiento, p.`nacionalidad`, p.`pais_origen` AS paisorigen, p.`fecha_ingreso_pais` AS fechaingresopais, p.`cert_migracion` AS certmigracion, p.`pep`, p.`codeps_fk` AS codeps, p.`codregimen_fk` AS codregimen, p.`codtipopoblacion_fk` AS codtipopoblacion, tp.`nombre_tp` tipopoblacion, sexo, ocupacion
                    FROM personas p
                    INNER JOIN tipo_poblacion tp ON tp.`codigo_tp` = p.`codtipopoblacion_fk`
                    WHERE codcaso_fk = :id";
      $paramsPersonas = array(':id' => $_POST["id"]);
      $tablePersonas = table($sqlPersonas, $paramsPersonas);
      foreach ($tablePersonas as $key => $value) {

        $sqlSintoma = "SELECT rp.`codsintoma_fk`
                        FROM reporte_sintomas rp
                        INNER JOIN sintomas s ON s.`codigo_sin` = rp.`codsintoma_fk`
                        WHERE rp.codpersona_fk = :codpersona";
        $tableSintomas = table($sqlSintoma, array(':codpersona' => $value["codigo_per"]));
        $s = array();
        foreach ($tableSintomas as $key1 => $value1) {
          array_push($s, $value1["codsintoma_fk"]);
        }
        
        array_push($personas, array(
                                    'codpersona' => $value["codpersona"],
                                    'tipoidentificacion' => $value["tipoidentificacion"],
                                    'numidentificacion' => $value["numidentificacion"],
                                    'nombres' => $value["nombres"], 
                                    'apellidos' => $value["apellidos"], 
                                    'telefono' => $value["telefono"], 
                                    'fechanacimiento' => $value["fechanacimiento"], 
                                    'lugarnacimiento' => $value["lugarnacimiento"], 
                                    'nacionalidad' => $value["nacionalidad"], 
                                    'paisorigen' => $value["paisorigen"], 
                                    'fechaingresopais' => $value["fechaingresopais"], 
                                    'certmigracion' => $value["certmigracion"], 
                                    'pep' => $value["pep"], 
                                    'codeps' => $value["codeps"], 
                                    'codregimen' => $value["codregimen"], 
                                    'tipopoblacion' => $value["codtipopoblacion"], 
                                    'sintomas' => implode(',', $s),
                                    'sexo' => $value["sexo"], 
                                    'ocupacion' => $value["ocupacion"]
                                  ));
      }

      $json = json_encode(array('caso' => $rowCaso, 'personas' => $personas));

    break;

    case 'loadObservaciones':

      $selectObservaciones = "SELECT o.*, u.nombre_usu AS nombreusuario, DATE_FORMAT(o.fecha_obc, '%Y-%m-%d %r') AS fechaformato
                                FROM observaciones_casos o
                                INNER JOIN usuarios u ON u.id_us = o.codusuario_fk
                                WHERE codcaso_fk = :codcaso AND estado_obc = 'on'
                                ORDER BY o.codigo_obc DESC";
      $tableObservaciones = table($selectObservaciones, array(':codcaso' => $_POST["codcaso"]));

      $json = json_encode(array('observaciones' => $tableObservaciones));
      
    break;

    case 'nuevaObservacion':
      
      $insertObservacion = "INSERT INTO observaciones_casos (codcaso_fk, codusuario_fk, descripcion_obc, fecha_obc) VALUES (:codcaso, :codusuario, :descripcion, :fecha)";
      $paramsObservacion = array(':codcaso' => $_POST["codcaso"], ':codusuario' => $_SESSION['BQV_codigo_usu'], ':descripcion' => mb_strtoupper(strtolower($_POST["descripcion"])), ':fecha' => datetimeNow());
      $queryObservacion = DataRowMySQL($insertObservacion, $paramsObservacion);

      if($queryObservacion != -1){
        $json = json_encode(array('success' => true));
      }else{
        $json = json_encode(array('success' => false, 'message' => 'Ocurrió un error al guardar Observación'));
      }

      
    break;

    case 'loadMap':

      $sql = "SELECT id_parque_fk, count(id_rp) as total, p.name_prq, p.latitude, p.longitude
              FROM reportes r
              INNER JOIN parques p ON p.id_prq = r.id_parque_fk
              GROUP BY id_parque_fk, p.name_prq, p.latitude, p.longitude";
      $table = table($sql);
      $json = json_encode($table);
    break;
    
  /************************ FIN procesos censo.php code ****************************/


  case 'loadReports':
    $sql = "SELECT id_rp, id_parque_fk, tipo FROM reportes";
    $table = table($sql);
    
    $parques=0;
    $zonasverdes=0;
    $gimnasios=0;
    $casospri=0;
    foreach ($table as $key => $value) {
      if($value["tipo"] == 'parques'){
        $parques++;
      }
      if($value["tipo"] == 'zonasverdes'){
        $zonasverdes++;
      }
      if($value["tipo"] == 'gimnasio'){
        $gimnasios++;
      }
    }
    $parqueconmasreportes="";
    $mayorreporte=0;
    $idparque=0;
    $sqlMasReportes = "SELECT id_parque_fk, count(id_rp) as total, p.name_prq
    FROM reportes r
    INNER JOIN parques p ON p.id_prq = r.id_parque_fk
    GROUP BY id_parque_fk, p.name_prq";
    $tableMasReportes = table($sqlMasReportes);
    foreach ($tableMasReportes as $key => $value) {
      if($mayorreporte < $value["total"]){
        $idparque = $value["id_parque_fk"];
        $parqueconmasreportes = $value["name_prq"];
        $mayorreporte = $value["total"];
      }
    }

    $json = json_encode(array('casostotales' => count($table), 'parques' => $parques, 'zonasverdes' => $zonasverdes, 'gimnasios' => $gimnasios, 'mas' => $mayorreporte, "nombreparque" => $parqueconmasreportes, 'idparque' => $idparque));
  break;

  case 'loadCasosReportes':
    $where = '';
    if($_GET["tipo"] == "parques" ){
      $where .= " WHERE r.tipo = 'parques'";
    }
    if($_GET["tipo"] == "zonasverdes" ){
      $where .= " WHERE r.tipo = 'zonasverdes'";
    }
    if($_GET["tipo"] == "gimnasios" ){
      $where .= " WHERE r.tipo = 'gimnasio'";
    }
    if($_GET["tipo"] == "mas" ){
      $where .= " WHERE r.id_parque_fk = ".$_GET["id"];
    }

    $sql = "SELECT r.id_rp, r.id_usuario_fk, r.id_parque_fk, r.tipo, r.comentario, r.imagen, r.fecha, p.name_prq, p.address, p.neighborhood, u.email, u.cellphone, u.name_complete
              FROM reportes r
              INNER JOIN parques p ON p.id_prq = r.id_parque_fk
              INNER JOIN usuarios u ON u.id_us = r.id_usuario_fk
              $where
              ORDER BY id_rp ASC";

    $table = table($sql);
    $i = 1;
    foreach ($table as $datarow => $data) {
      $image = '<a href="'.urlPHP('app/assets/'.$data["imagen"]).'" target="_blank">Ver imágen</a>';
      array_push($createtable['data'], array($i, $data["name_prq"], $data["name_complete"], $data["comentario"], $image, $data["fecha"])); //, $options
      $i++;
    }
    $json = json_encode($createtable);
  break;




  // CODE USUARIOS.PHP
  case 'loadUsuarios':
    $sql = "SELECT u.id_us, u.nombre_usu, u.email, p.codigo_perfil, p.nombre_perfil, u.estado
              FROM usuarios u
              INNER JOIN perfiles p ON p.codigo_perfil = u.codperfil_fk
              ORDER BY id_us ASC";

      $table = table($sql);
      $i = 1;
      foreach ($table as $datarow => $data) {

        $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Editar email" onclick="fmodalEditar('.$data["id_us"].', \''.$data["nombre_usu"].'\', \''.$data["email"].'\', '.$data["codigo_perfil"].', \''.$data["estado"].'\')"><i class="fa fa-edit"></i></a>';
        $options =($data["estado"] == 'on' ? $edit : $edit);
          
        array_push($createtable['data'], array($i, $data["nombre_usu"], $data["email"], $data["nombre_perfil"], $data["estado"], $options));

        $i++;

      }
      $json = json_encode($createtable);
  break;

  case 'editItemUsuario':
    

    $sql = "SELECT id_us FROM usuarios WHERE email = :email AND id_us != :codigousu";
    $row = row($sql, array(':email' => $email, ':codigousu' => $codusuario));

    if($row == ''){
      if($contra != ''){
        $and = ' , pass = "'.sha1($contra).'"';
      }else{
        $and = '';
      }
      $update = "UPDATE usuarios SET nombre_usu = :nombreusu, email = :email, codperfil_fk = :codperfil, estado = :estado $and WHERE id_us = :codusuario";
      $params = array(':nombreusu' => $nombreusuario, ':email' => $email, ':codperfil' => $perfil, ':estado' => $estado, ':codusuario'=>$codusuario);
  
      if(query($update, $params)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array('success' => false, 'message' => 'No se Actualizó la información. Por favor, intentelo de nuevo'));
      }
    }else{
      $json = json_encode(array('success' => false, 'message' => 'Usuario de acceso ingresado no disponible'));
    }
    
  break;

  case 'insertItemUsuario':

    $sql = "SELECT id_us FROM usuarios WHERE email = :email";
    $row = row($sql, array(':email' => $email));

    if($row == ''){

      $insert = "INSERT INTO usuarios (nombre_usu, email, pass, codperfil_fk, foto, estado) VALUES (:nombreusu, :email, :contra, :codperfil, 'avatar.jpg', :estado)";
      $paramsInsert = array(':nombreusu' => $nombreusuario, ':email' => $email, ':contra' => sha1($contra), ':codperfil' => $perfil, ':estado' => $estado);
      
      if(query($insert, $paramsInsert)){
        $json = json_encode(array("success"=>true));
      }else{
        $json = json_encode(array("success"=>false,"message" => "Error al insertar Usuario"));
      }
    }else{
      $json = json_encode(array('success' => false, 'message' => 'Usuario de acceso ingresado no disponible'));
    }
    
  break;


  /* *************************************************** listado de parques *********************************************/
  case 'loadParques':

    $where = '';
    if($_GET["estado"] != ""){
      $where .= ' AND state_prq = '.$_GET["estado"];
    }

    $sql = "SELECT *
            FROM parques
            WHERE name_prq ILIKE '%".trim($_GET["nombre"])."%'
            $where 
            ORDER BY id_prq ASC";

    $table = table($sql);
    $i = 1;
    foreach ($table as $datarow => $data) {

      $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Ver parque" ><i class="fa fa-eye"></i></a>';
      // onclick=""fMostarCaso('.$data["id_prq"].')
      
      $options = $edit;
        
      array_push($createtable['data'], array($i, $data["name_prq"], $data["address"],'SÍ', 'SÍ', ($data["gym"] == 1 ? 'SÍ' : 'NO'), $data["neighborhood"], ($data["state_prq"] == 1 ? 'ACTIVO' : 'INACTIVO'), $options));

      $i++;

    }
    $json = json_encode($createtable);
  break;

  /* *************************************************** listado de reportes *********************************************/

  
  case 'loadReportes':
    $where = '';
    if($_GET["tipo"] == "parques" ){
      $where .= " WHERE r.tipo = 'parques'";
    }
    if($_GET["tipo"] == "zonasverdes" ){
      $where .= " WHERE r.tipo = 'zonasverdes'";
    }
    if($_GET["tipo"] == "gimnasios" ){
      $where .= " WHERE r.tipo = 'gimnasio'";
    }
    if($_GET["tipo"] == "mas" ){
      $where .= " WHERE r.id_parque_fk = ".$_GET["id"];
    }

    $sql = "SELECT r.id_rp, r.id_usuario_fk, r.id_parque_fk, r.tipo, r.comentario, r.imagen, r.fecha, r.estado, p.name_prq, p.address, p.neighborhood, u.email, u.cellphone, u.name_complete
              FROM reportes r
              INNER JOIN parques p ON p.id_prq = r.id_parque_fk
              INNER JOIN usuarios u ON u.id_us = r.id_usuario_fk
              $where
              ORDER BY id_rp ASC";
    $edit = '<a class="btn btn-sm btn-primary tooltips" data-rel="tooltip" data-placement="bottom" title="Ver parque" ><i class="fa fa-eye"></i></a>';
    // onclick=""fMostarCaso('.$data["id_prq"].')
    
    $options = $edit;

    $table = table($sql);
    $i = 1;
    foreach ($table as $datarow => $data) {
      $image = '<a style="color:#72777a  !important" href="'.urlPHP('app/assets/'.$data["imagen"]).'" target="_blank">Ver imágen</a>';
      array_push($createtable['data'], array($i, $data["name_prq"], $data["name_complete"], $data["tipo"], $data["comentario"], $data["fecha"], $image,  $data["estado"], $options)); //, $options
      $i++;
    }
    $json = json_encode($createtable);
  break;


 
  
  
}
echo $json;

?>

