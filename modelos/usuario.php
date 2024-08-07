<?php
    class Usuario{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    //metodos
    // consulta
    public function consulta(){
        $con= "SELECT * from usuario ORDER BY id_usuario";
        
        $res=mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }

        return $vec;
    }



    //eliminar
    public function eliminar($id){
        $del="DELETE FROM usuario WHERE id_usuario=$id";
        mysqli_query($this->conexion, $del);
        $vec=[];
        $vec['resultado']='ok';
        $vec['mensaje']='el usuario ha sido eliminado';
        return $vec;
    }

    //editar

 

    public function editar($id,$params){
        $editar= "UPDATE usuario SET cedula='$params->cedula', nombre_usuario='$params->nombre_usuario', direccion='$params->direccion', fecha_nacimiento='$params->fecha_nacimiento', celular='$params->celular',email_usuario='$params->email_usuario', rol='$params->rol', clave='$params->clave'  WHERE id_usuario=$id";
        mysqli_query($this->conexion, $editar);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nombre del usuario ha sido editado";
        return $vec;
    }

  

    //insertar

    public function insertar($params){
        $ins="INSERT INTO usuario(cedula,nombre_usuario, direccion, fecha_nacimiento, celular, email_usuario, rol, clave) VALUES ('$params->cedula', '$params->nombre_usuario', '$params->direccion', '$params->fecha_nacimiento','$params->celular', '$params->email_usuario', '$params->rol', '$params->clave')";
        mysqli_query($this->conexion, $ins);
        $vec=[];
        $vec["resultado"]= "ok";
        $vec["mensaje"]= "el nuevo campo de registro de usuario ha sido guardado";
        return $vec;
    
    
    }


    public function filtro($datos){
        $filtro= "SELECT * FROM usuario WHERE cedula = '$datos'";
        $res=mysqli_query($this->conexion, $filtro) or die ('no consulto categoria');
        $vec=[];

        while ($row=mysqli_fetch_array($res)){
            $vec[]=$row;
            
        }

        return $vec;

    }

//     public function consultar_usuario($dato){
//         // $con="SELECT c.*, ci.municipio AS municipios FROM usuario c 
//         // INNER JOIN municipios ci ON c.rol=ci.id_ciudad 
//         // WHERE c.cedula= 'dato'
//         // ORDER BY c.nombre_usuario";

        

//         // $res=mysqli_query($this->conexion,$con);
//         // $vec=[];

//         // while ($row=mysqli_fetch_array($res)){
//         //     $vec[]=$row;
//         // }
//         // return $vec;
     
    
//         $con= "SELECT * FROM usuario WHERE cedula LIKE '%$dato%'";
//         $res=mysqli_query($this->conexion, $con);
//         $vec=[];

//         while ($row=mysqli_fetch_array($res)){
//             $vec[]=$row;
//     }

//     return $vec;

// }
   


}
?>