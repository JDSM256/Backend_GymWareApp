<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/ciudad.php');


    $cate= new Ciudad($conexion);

    
    $vec = $cate->consulta();
   

    $datosj=json_encode($vec);
    echo $datosj;
   // header('Content-Type: application/json');

?>