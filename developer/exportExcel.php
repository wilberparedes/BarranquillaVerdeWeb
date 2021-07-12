<?php

require_once 'PDOConn.php';
require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$arrayestrato = array('ESTRATO UNO', 'ESTRATO DOS', 'ESTRATO TRES', 'ESTRATO CUATRO', 'ESTRATO CINCO', 'ESTRATO SEIS', 'NO APLICA');
$nucleofamiliar = array('1', '2', '3 O MÁS');
$serviciospublicos = array('AG' => 'AGUA', 'LU' => 'LUZ', 'GA' => 'GAS', 'TE' => 'TELÉFONO', 'TV' => 'TELEVISIÓN', 'IN' => 'INTERNET', 'AL' => 'ALCANTARILLADO');
$tipoid = array('E' => 'CÉDULA DE CIUDADANIA', 'C' => 'CÉDULA DE EXTRANJERÍA', 'N' => 'NIT', 'I' => 'NUIP', 'P' => 'PASAPORTE', 'R' => 'REGISTRO CIVIL', 'T' => 'TARJETA DE IDENTIDAD', 'X' => 'NO DEFINIDO');
$nacionalidad = array('CO' => 'COLOMBIANO', 'EX' => 'EXTRANJERO');
$sinoresp = array('SÍ', 'NO');
// echo 'asfasfsaf';
$objPHPExcel->setActiveSheetIndex(0);
$rowCount = 1;




$sql = "SELECT c.codigo_caso, c.direccion, c.codeventoepide_fk, ee.`nombre_ee`, mo.nombre_mor, c.estado_caso, estrato_economico, nucleo_familiar, servicios_publicos, se.`nombre_sec`, ba.`nombre_ba`, c.`realizaprueba`, c.`fechaprueba`, c.resultadopruebapcr, c.`resultadoprueba`, c.`fecha_ingreso`, c.`fecha_act`, p.codigo_per, p.`tipo_identificacion`, p.`num_identificacion`, p.`nombres`, p.`apellidos`, p.`telefono`, p.`fecha_nacimiento`, p.`edad`, p.`lugar_nacimiento`, p.`nacionalidad`, p.`pais_origen`, p.`fecha_ingreso_pais`, p.`cert_migracion`, p.`pep`, p.sexo, p.ocupacion, e.`nombre_eps`, r.`nombre_rg`, t.`nombre_tp`, c.estado_paciente
                FROM casos c
                INNER JOIN eventos_epidemiologicos ee ON ee.codigo_ee = c.codeventoepide_fk
                INNER JOIN morbilidades mo ON mo.codigo_mor = c.codmorbilidad_fk 
                INNER JOIN barrios ba ON ba.`codigo_ba` = c.`codbarrio_fk`
                INNER JOIN sectores se ON se.`codigo_sec` = ba.`codsector_fk`
                INNER JOIN personas p ON p.`codcaso_fk` = c.`codigo_caso`
                INNER JOIN eps e ON e.`codigo_eps` = p.`codeps_fk`
                INNER JOIN regimenes r ON r.`codigo_rg` = p.`codregimen_fk`
                INNER JOIN tipo_poblacion t ON t.`codigo_tp` = p.`codtipopoblacion_fk`
                
                ORDER BY codigo_caso ASC";
$table = table($sql);

$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'Estado');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Sector');
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Barrio');
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Dirección');
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Morbilidad');

$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, 'Se realiza prueba');
$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, 'Fecha de prueba');
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, 'Resultado prueba PCR');
$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, 'Resultado prueba serológica');
$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, 'Estado paciente');


$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, 'Tipo documento');
$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, 'Nombres');
$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, 'Apellidos');
$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, 'Teléfono');

$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, 'Sexo');
$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, 'Ocupación');

$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, 'Fecha de nacimiento');
$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, 'Edad');
$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, 'Lugar de nacimiento');
$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, 'Nacionalidad');
$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, 'País origen');
$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, 'Fecha de ingreso al país');
$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, 'Permiso especial de permanencia');
$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, 'Certificado de migración');
$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, 'Tipo de población');
$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, 'Sintomas');
$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, 'EPS');
$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, 'Regimen');

$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, 'Estrato socioeconómico');
$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, 'Nucleo familiar');
$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, 'Servicios públicos');
$rowCount++;
foreach ($table as $key => $value) {
    
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value["estado_caso"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value["nombre_sec"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value["nombre_ba"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value["direccion"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value["nombre_mor"]);

    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value["realizaprueba"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, ($value["fechaprueba"] == NULL ? 'NO APLICA' : $value["fechaprueba"]));
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, ($value["resultadopruebapcr"] == NULL ? 'NO APLICA' : strtoupper(strtolower($value["resultadopruebapcr"]))));
    $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, ($value["resultadoprueba"] == NULL ? 'NO APLICA' : strtoupper(strtolower($value["resultadoprueba"]))));
    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, ($value["estado_paciente"] == NULL ? 'NO APLICA' : strtoupper(strtolower($value["estado_paciente"]))));

    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $tipoid[$value["tipo_identificacion"]]);
    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value["nombres"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $value["apellidos"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $value["telefono"]);

    $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, ($value["sexo"] == 'M' ? 'MASCULINO' : 'FEMENINO'));
    $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, strtoupper(strtolower($value["ocupacion"])));

    $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $value["fecha_nacimiento"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $value["edad"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $value["lugar_nacimiento"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $nacionalidad[$value["nacionalidad"]]);
    $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, ($value["pais_origen"] == NULL ? 'NO APLICA' : $value["pais_origen"]));
    $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, ($value["fecha_ingreso_pais"] == NULL ? 'NO APLICA' : $value["fecha_ingreso_pais"]));
    $sqlSintoma = "SELECT s.`nombre_sin`
                        FROM reporte_sintomas rp
                        INNER JOIN sintomas s ON s.`codigo_sin` = rp.`codsintoma_fk`
                        WHERE rp.codpersona_fk = :codpersona";
    $tableSintomas = table($sqlSintoma, array(':codpersona' => $value["codigo_per"]));
    $s = array();
    foreach ($tableSintomas as $key1 => $value1) {
        array_push($s, $value1["nombre_sin"]);
    }

    $objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, ($value["pep"] == NULL ? 'NO APLICA' : $sinoresp[$value["pep"]]));
    $objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, ($value["cert_migracion"] == NULL ? 'NO APLICA' : $sinoresp[$value["cert_migracion"]]));
    $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $value["nombre_tp"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, implode(',', $s));
    $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $value["nombre_eps"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $value["nombre_rg"]);

    $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $value["estrato_economico"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $value["nucleo_familiar"]);
    $arraysp = explode(",", $value["servicios_publicos"]);
    $sp = array();
    foreach ($arraysp as $key2 => $value2) {
        array_push($sp, $serviciospublicos[$value2]);
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, implode(',', $sp));
    $rowCount++;
}

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$name = datetimeNowNAME();
$objWriter->save("excel/".$name.".xlsx");
echo json_encode(array('link' => '../developer/excel/'.$name.'.xlsx', 'name' => $name));

?>