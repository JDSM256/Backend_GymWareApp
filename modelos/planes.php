<?php
    class Plan{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    // consulta
    public function consulta(){
        $con= "SELECT * from planes ORDER BY id_plan";
        
        $res=mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }


    //eliminar
    public function eliminar($id){
        $del="DELETE FROM planes WHERE id_plan=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vec['mensaje']='el plan ha sido eliminado';
        return $vec;
    }

    //editar

 

    public function editar($id,$params){
        $editar= "UPDATE planes SET codigo_plan='$params->codigo_plan', nombre_plan='$params->nombre_plan', precio_plan='$params->precio_plan' WHERE id_plan=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nombre del plan ha sido editado";
        return $vec;
    }

  

    //insertar

    public function insertar($params){
        $ins="INSERT INTO planes (codigo_plan,nombre_plan, precio_plan) VALUES ('$params->codigo_plan', '$params->nombre_plan', '$params->precio_plan')";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    
    }


    public function filtro($datos){
        $filtro= "SELECT * FROM planes WHERE codigo_plan = '$datos'";
        $res=mysqli_query($this->conexion, $filtro) or die ('no consulto categoria');
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
            
        }

        return $vec;

    }

    // public function consultar_plan($dato){
    //     // $con="SELECT c.*, ci.municipio AS municipios FROM plan c 
    //     // INNER JOIN municipios ci ON c.fo_ciudad=ci.id_ciudad 
    //     // WHERE c.codigo_plan= 'dato'
    //     // ORDER BY c.nombre_plan";

        

    //     // $res=mysqli_query($this->conexion,$con);
    //     // $vec=[];

    //     // while ($row=mysqli_fetch_array($res)){
    //     //     $vec[]=$row;
    //     // }
    //     // return $vec;
     
    
    //     $con= "SELECT * FROM plan WHERE codigo_plan LIKE '%$dato%'";
    //     $res=mysqli_query($this->conexion, $con);
    //     $vec=[];

    //     while ($row=mysqli_fetch_array($res)){
    //         $vec[]=$row;
    // }

    // return $vec;

}
   

