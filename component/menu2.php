<?php
    session_start();
    $codrol = $_SESSION['BQV_codrol'];
    include '../developer/var.php';
    require_once '../developer/PDOConn.php';

    $sqlrolesmenu = "SELECT menus FROM roles WHERE codigo_rol=:codrol AND estado_rol=:estado";
    $rowrolesmenu = row($sqlrolesmenu, array(':codrol'=>$codrol, ':estado' => 'on'));
    $modulos = explode(",", $rowrolesmenu['menus']);

    $html = '';
    $sql = "SELECT codigo_menu, imagen, nombre_menu, nivel, orden, codsuperior, link, estado, target FROM menu WHERE estado = :estado AND nivel = :nivel ORDER BY orden ASC";
    $params = array(':estado' => 'on', ':nivel' => 1);

    $table = table($sql, $params);
    $i = 1;
    foreach ($table as $datarow => $data) {

        $submenu = table("SELECT codigo_menu, nombre_menu, link, imagen FROM menu WHERE codsuperior = :codsuperior ORDER BY orden ASC", array(':codsuperior' => $data["codigo_menu"]));
        if(count($submenu) != 0){
            $as = 0;
            $html2 = '';
            foreach ($submenu as $datarow1 => $data1) {
                $pos = in_array($data1["codigo_menu"], $modulos);
                if($pos != false){
                    $html2 .= '<li id="m'.$data1["codigo_menu"].'">';
                    // $html2 .= '<i class="'.$data1["imagen"].'"></i>';//class="active"
                    $html2 .= '<a onclick="loadpag(\'../'.$data1["link"].'\',\''.$data1["codigo_menu"].'\',\''.$data["codigo_menu"].'\');" >'.$data1["nombre_menu"].'</a>';
                    $html2 .= '</li>';
                    $as++;
                }
            }
            if($as > 0){
                $html .= '<li id="m'.$data["codigo_menu"].'" class="menu-item-has-children dropdown">';
                $html .= '<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon '.$data["imagen"].'"></i>'.$data["nombre_menu"].'</a>';
                $html .= '<ul class="sub-menu children dropdown-menu">';
                $html .= $html2;
                $html .= '</ul>';
                $html .= '</li>';
            }
        }else{
            $pos = in_array($data["codigo_menu"], $modulos);
            if($pos != false){
                $html .= '<li id="m'.$data["codigo_menu"].'">';
                $html .= '<a onclick="loadpag(\'../'.$data["link"].'\',\''.$data["codigo_menu"].'\');" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon '.$data["imagen"].'"></i>'.$data["nombre_menu"].'</a>';
                $html .= '</li>'; 
            }
        }
        $i++;
    }

    // $imp = '<aside id="left-panel" class="left-panel">';
    $imp = '<nav class="navbar navbar-expand-sm navbar-default">';
    $imp .= '<div class="navbar-header">';
    $imp .= '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">';
    $imp .= '<i class="ti-menu"></i>';
    $imp .= '</button>';
    $imp .= '<a class="navbar-brand" href="./"><img src="'.urlPHP('assets/images/logo.png').'" alt="Logo"></a>';
    $imp .= '<a class="navbar-brand hidden" href="./"><img src="'.urlPHP('assets/images/logo2.png').'" alt="Logo"></a>';
    $imp .= '</div>';
    $imp .= '<div id="main-menu" class="main-menu collapse navbar-collapse">';
    $imp .= '<ul class="nav navbar-nav">';
    $imp .= $html;
    $imp .= '</ul>';
    $imp .= '</div>';
    $imp .= '</nav>';
    // $imp .= '</aside>';
    echo trim($imp);

?>