<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/cliente.php');


    $control= $_GET['control'];

    $clientes= new Cliente($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $clientes->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            // $json = '{"identificacion":"123456","nombre_cliente":"Prueba2", "direccion_cliente":"asdsa sdsads asdsad", "celular_cliente":"321321654", "email_cliente":"prieba@gmail.com", "fo_ciudad":"20"}';
            $params=json_decode($json);
            $vec=$clientes->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $clientes->eliminar($id);
        break;

        case'editar':
            $json=file_get_contents('php://input');
            //$json = '{"identificacion":"123456","nombre_cliente":"Prueba2", "direccion_cliente":"Risaralda", "celular_cliente":"321321654", "email_cliente":"prieba@gmail.com", "fo_ciudad":"20"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            //$id=24;
            $vec= $clientes->editar($id,$params);
        break;
        case 'filtro':
            $datos=$_GET['datos'];
            $vec=$clientes->filtro($datos);
        break;
        case 'ccliente':
            $datos=$_GET['datos'];
            $vec=$clientes->consultar_cliente($datos);
        break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

