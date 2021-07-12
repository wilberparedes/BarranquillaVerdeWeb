<?php

require_once 'var.php';
require_once 'PDOConn.php';
require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0);
$rowCount = 1;

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

$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, 'Parque');
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, 'Ciudadano');
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, 'Comentario');
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, 'Imagen');
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, 'Fecha');


$rowCount++;
foreach ($table as $key => $value) {

    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value["name_prq"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value["name_complete"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value["comentario"]);
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, '=Hyperlink("'.urlPHP('app/assets/'.$value["imagen"]).'","Ver imagen")');
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value["fecha"]);

    $rowCount++;

}

$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$name = datetimeNowNAME();
$objWriter->save("excel/".$name."_REPORTE.xlsx");
echo json_encode(array('link' => '../developer/excel/'.$name.'_REPORTE.xlsx', 'name' => $name.'_REPORTE'));

?>