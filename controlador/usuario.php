<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/usuario.php');


    $control= $_GET['control'];

    $usuario= new Usuario($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $usuario->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            // $json = '{"cedula":"123456","nombre_usuario":"Sancho Panza", "direccion":"miami-dale", "fecha_nacimiento":"1970-11-24", "celular":"22222222222", "email_usuario":"lanecropsiadesatan@gmail.com", "rol":"admin", "clave":"1234"}';
            $params=json_decode($json);
            $vec=$usuario->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $usuario->eliminar($id);
        break;

        case'editar':
            $json=file_get_contents('php://input');
            // $json = '{"cedula":"123456","nombre_usuario":"Sancho Panza", "direccion":"miami-dale", "fecha_nacimiento":"1970-11-24", "celular":"333333333", "email_usuario":"lanecropsiadesatan@gmail.com", "rol":"admin", "clave":"1234"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            // $id=56;
            $vec= $usuario->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['datos'];
            $vec=$usuario->filtro($datos);
        break;
        // case 'cusuario':
        //     $dato=$_GET['datos'];
        //     $vec=$usuario->consultar_usuario($datos);
        // break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

