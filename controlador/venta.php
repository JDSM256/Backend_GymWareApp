<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/venta.php');


    $control= $_GET['control'];

    $ventas= new Venta($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $ventas->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            // $json = '{"fecha":"2023-01-01","fo_cliente":"3", "fo_plan":"53", "cantidad":"2", "subtotal":"500000", "total":"500000"}';
            $params=json_decode($json);
            $vec=$ventas->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $ventas->eliminar($id);
        break;

        case'editar':
            $json=file_get_contents('php://input');
            // $json = '{"fecha":"2023-01-01","fo_cliente":"3", "fo_plan":"53", "cantidad":"3", "subtotal":"750000", "total":"750000"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            // $id=11;
            $vec= $ventas->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['datos'];
            $vec=$ventas->filtro($datos);
        break;
        // case 'ccliente':
        //     $dato=$_GET['datos'];
        //     $vec=$ventas->consultar_cliente($datos);
        // break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

