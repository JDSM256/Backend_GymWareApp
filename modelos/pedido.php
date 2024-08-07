<?php
    class Pedido{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    // consulta
    public function consulta(){
        $con= "SELECT * from venta ORDER BY id_venta";
        
        $res=mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }



    //eliminar
    public function eliminar($id){
        $del="DELETE FROM venta WHERE id_venta=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vec['mensaje']='la venta ha sido eliminada';
        return $vec;
    }

    //editar

 

    public function editar($id,$params){
        $editar= "UPDATE venta SET fecha='$params->fecha', fo_cliente='$params->fo_cliente', fo_plan='$params->fo_plan', cantidad='$params->cantidad',subtotal='$params->subtotal', total=$params->total  WHERE id_venta=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "la venta ha sido editada";
        return $vec;
    }

  

    //insertar

    public function insertar($params){
        $ins="INSERT INTO venta(fecha,fo_cliente, fo_plan, cantidad,subtotal, total) VALUES ('$params->fecha', '$params->fo_cliente', '$params->fo_plan', '$params->cantidad', '$params->subtotal', '$params->total')";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "la venta ha sido registrada exitosamente";
        return $vec;
    
    
    }


    public function filtro($datos){
        $filtro= "SELECT * FROM venta WHERE fecha = '$datos'";
        $res=mysqli_query($this->conexion, $filtro) or die ('no consulto categoria');
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
            
        }

        return $vec;

    }

//     public function consultar_venta($dato){
//         // $con="SELECT c.*, ci.municipio AS municipios FROM venta c 
//         // INNER JOIN municipios ci ON c.total=ci.id_ciudad 
//         // WHERE c.fecha= 'dato'
//         // ORDER BY c.fo_cliente";

        

//         // $res=mysqli_query($this->conexion,$con);
//         // $vec=[];

//         // while ($row=mysqli_fetch_array($res)){
//         //     $vec[]=$row;
//         // }
//         // return $vec;
     
    
//         $con= "SELECT * FROM venta WHERE fecha LIKE '%$dato%'";
//         $res=mysqli_query($this->conexion, $con);
//         $vec=[];

//         while ($row=mysqli_fetch_array($res)){
//             $vec[]=$row;
//     }

//     return $vec;

// }
   


}
?>