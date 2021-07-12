<?php
date_default_timezone_set('America/Bogota');
include 'config.php';

/*Funciones de operacion retorna 0 o 1*/
function query($sql,$params=null){
    try {
        
        $conn= new PDO(connstring,user,pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $sw= true; 
    } catch (Exception $ex) {
        echo "ERROR: " . $ex->getMessage();
        // $sw=json_encode(array("mensaje" => $ex->getMessage()));
        $sw=false;
    }
  return $sw;
}

/*Devuelve una fila*/
function row($sql,$params=null){
    try {
        
        $conn= new PDO(connstring,user,pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
    } catch (Exception $ex) {
        echo "ERROR: " . $ex->getMessage();
    }
  return $row;
}

/*Devuelve una id del que se insertó*/
function DataRow($sql,$params=null){
    try {
        
        $conn= new PDO(connstring,user,pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $DataRow = $stmt->fetch(PDO::FETCH_ASSOC);
         
    } catch (Exception $ex) {
        echo "ERROR: " . $ex->getMessage();
    }
  return $DataRow;
}

function DataRowMySQL($sql,$params=null){
    try {
        
        $conn= new PDO(connstring,user,pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $DataRow = $conn->lastInsertId();;
         
    } catch (Exception $ex) {
        echo "ERROR: " . $ex->getMessage();
    }
  return $DataRow;
}

/*Devuelve una tabla*/
function table($sql,$params=null){
    $data=array();
    
    try {
        
        $conn= new PDO(connstring,user,pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
             $data[] = $row;   
        }  
    } catch (Exception $ex) {
        echo "ERROR: " . $ex->getMessage();
    }
  return $data;
}

// *Devolver hora actual*

function datetimeNow(){
    $actual = date("Y-m-d H:i:s");
    return $actual;
}

function dateNow(){

    $fechaactual = getdate();

    $anio=$fechaactual['year'];
    $mes=$fechaactual['mon'];
    $dia=$fechaactual['mday'];


    $actual =  ($anio<=9 ? '0' .$anio : $anio)."-".($mes<=9 ? '0' .$mes : $mes)."-".($dia<=9 ? '0' .$dia : $dia);

    return $actual;
}

function conversorSegundosHoras($tiempo_en_segundos) {
    $horas = floor($tiempo_en_segundos / 3600);
    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

    return ($horas < 10 ? '0'.$horas : $horas) . ':' . ($minutos < 10 ? '0'.$minutos : $minutos) . ":" . ($segundos < 10 ? '0'.$segundos : $segundos);
}

function datetimeNowNAME(){
    $actual = 'EXPORT_CASOS';
    return $actual;
}


function returnDays($datestart, $dateend){
    $fecha1= new DateTime($datestart);
    $fecha2= new DateTime($dateend);
    $diff = $fecha1->diff($fecha2);
    return $diff->days;
}


?>

