<?php
    $servidor= 'localhost';
    $usuario= 'root';
    $clave='';
    $bd='devprogram';

    $conexion=mysqli_connect($servidor,$usuario,$clave) or die ('No se encontró servidor');
    mysqli_select_db($conexion,$bd) or die ('no encontró la base de datos ') ;
    mysqli_set_charset($conexion, 'utf8');
    // echo'se conectó correctamente';



?>