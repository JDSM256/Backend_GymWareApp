<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X_Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/login.php');


    // $control= $_GET['control'];
    $email_usuario= $_GET['email_usuario'];
    $clave=$_GET['clave'];

    $login= new Login($conexion);

    $vec= $login -> consulta($email_usuario,$clave);

    

    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

?>