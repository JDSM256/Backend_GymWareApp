<?php
    header('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept');

    require_once('../conexion.php');
    require_once('../modelos/planes.php');


    $control= $_GET['control'];

    $plan= new Plan($conexion);

    switch ($control) {
        case 'consulta':
            $vec= $plan->consulta();
        break;
        case 'insertar':
            $json=file_get_contents('php://input');
            // $json = '{"codigo_plan":"444444","nombre_plan":"Prueba3", "precio_plan":"5"}';
            $params=json_decode($json);
            $vec=$plan->insertar($params);
        break;
        case 'eliminar':
            $id=$_GET['id'];
            $vec= $plan->eliminar($id);
        break;

        case'editar':
            $json=file_get_contents('php://input');
            // $json = '{"codigo_plan":"1128282862","nombre_plan":"gymrats", "precio_plan":"1000000"}';
            $params=json_decode($json);
            $id=$_GET['id'];
            // $id=54;
            $vec= $plan->editar($id,$params);
        break;
        case 'filtro':
            $dato=$_GET['datos'];
            $vec=$plan->filtro($datos);
        break;
        // case 'cplan':
        //     $dato=$_GET['datos'];
        //     $vec=$plan->consultar_plan($datos);
        // break;

    }

    $datosj=json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

