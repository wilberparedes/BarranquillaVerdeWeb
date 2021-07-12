<?php 


	date_default_timezone_set('Pacific/Honolulu');

	// $fechaactual = getdate();

 //    $hora=$fechaactual['hours'];
 //    $minuto=$fechaactual['minutes'];
 //    $segundo=$fechaactual['seconds'];
 //    // $fecha1=
 //     // $fechaactual = strtotime ( '-5 hour' , strtotime ( $fechaactual ) ) 

 //    $anio=$fechaactual['year'];
 //    $mes=$fechaactual['mon'];
 //    $dia=$fechaactual['mday'];
 //    $actual =  ($anio<=9 ? '0' .$anio : $anio)."-".($mes<=9 ? '0' .$mes : $mes)."-".($dia<=9 ? '0' .$dia : $dia)." ".($hora<=9 ? '0' .$hora : $hora).":".($minuto<=9 ? '0' .$minuto : $minuto).":".($segundo<=9 ? '0' .$segundo : $segundo);

    $marcatiempo = date("Y-m-d H:i:s");

 //    $fechaactual1 = strtotime ( '-5 hour' , strtotime ( $actual ) ) ;
 //    $nuevafecha = date ( 'Y-m-d H:i:s' , $fechaactual1 );
	// echo $nuevafecha;
    echo $marcatiempo;



?>