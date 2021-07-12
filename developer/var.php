<?php

function url($data){

	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/barranquilla-verde/".$data;

	echo $link;
}

function urlPHP($data){

	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/barranquilla-verde/".$data;

	return $link;
}


function imgPerfil(){
	$img = "http://aplicaciones.americana.edu.co:8080/sgacampus/images/dynamic/foto/1/".$_SESSION['SAEP_codigo_usu']."/".$_SESSION['SAEP_codigo_usu'].".jpg?width=300&cut=1";
	echo $img;
}

function imgPerfilStudent($id){
	$img = "http://aplicaciones.americana.edu.co:8080/sgacampus/images/dynamic/foto/1/".$id."/".$id.".jpg?width=300&cut=1";
	echo $img;
}

function imgPerfilPHP(){
	$img = "http://aplicaciones.americana.edu.co:8080/sgacampus/images/dynamic/foto/1/".$_SESSION['SAEP_codigo_usu']."/".$_SESSION['SAEP_codigo_usu'].".jpg?width=300&cut=1";
	return $img;
}

?>