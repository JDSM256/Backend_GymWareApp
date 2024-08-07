<?php
    class Cliente{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    // consulta
    public function consulta(){
        $con= "SELECT *, m.municipio AS ciudad from cliente c
        INNER JOIN municipios m
        ON c.fo_ciudad= m.id_ciudad"; 
        $res=mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }



    //eliminar
    public function eliminar($id){
        $del="DELETE FROM cliente WHERE id_cliente=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vec['mensaje']='el cliente ha sido eliminado';
        return $vec;
    }

    //editar

 

    public function editar($id,$params){
        $editar= "UPDATE cliente SET identificacion='$params->identificacion', nombre_cliente='$params->nombre_cliente', direccion_cliente='$params->direccion_cliente', celular_cliente='$params->celular_cliente',email_cliente='$params->email_cliente', fo_ciudad=$params->fo_ciudad  WHERE id_cliente=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nombre del cliente ha sido editado";
        return $vec;
    }

  

    //insertar

    public function insertar($params){
        $ins="INSERT INTO cliente(identificacion,nombre_cliente, direccion_cliente, celular_cliente,email_cliente, fo_ciudad) VALUES ('$params->identificacion', '$params->nombre_cliente', '$params->direccion_cliente', '$params->celular_cliente', '$params->email_cliente', $params->fo_ciudad)";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    
    }


    public function filtro($datos){
        $con= "SELECT c.*, ci.municipio AS municipios FROM cliente c 
                  INNER JOIN municipios ci ON c.fo_ciudad=ci.id_ciudad
                  WHERE c.identificacion LIKE '%$datos%' OR c.nombre_cliente LIKE '%$datos%' OR c.email_cliente LIKE '%$datos%'
                  ORDER BY c.nombre_cliente";

        $res=mysqli_query($this->conexion, $con) or die ('no consulto categoria');
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
            
        }

        return $vec;

    }

    public function consultar_cliente($datos){
        $con= "SELECT c.*, ci.municipio AS municipios FROM cliente c 
                  INNER JOIN municipios ci ON c.fo_ciudad=ci.id_ciudad
                  WHERE c.identificacion='$datos'
                  ORDER BY c.nombre_cliente";

        $res=mysqli_query($this->conexion,$con);
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
        }
        return $vec;
}
   


}
?>