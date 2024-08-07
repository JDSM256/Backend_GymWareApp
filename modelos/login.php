<?php
    class Login{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
    }

    public function consulta($email_usuario, $clave){
        $con= "SELECT * FROM usuario WHERE email_usuario='$email_usuario' && clave= ('$clave')";
        $res= mysqli_query($this->conexion, $con);
        $vec=[];
        while ($row=mysqli_fetch_array($res)) {
            $vec[]=$row;            # code...
        }
        if($vec==[]){
            $vec[0] = array ("validar" => "no valida");

        }else{
            $vec[0]['validar']='valida';
        }
        return $vec;
    }




   

}
?>