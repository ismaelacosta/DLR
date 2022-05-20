<?php

require_once "C:/xampp/htdocs/DLR/resources/config/db_conection.php";

class Login_model {

    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }


    public function check_user($usuario, $contrasena){

        try {
            $sql = "SELECT * FROM usuario WHERE username= :usuario and password= :contrasena";
            $resultado = $this->db->prepare($sql);

           $resultado->bindValue(":usuario",$usuario);
           $resultado->bindValue(":contrasena",$contrasena);

            $resultado->execute();

            $numero_registro = $resultado->rowCount();
            
            return $numero_registro;
        } catch (Exception $e) {
            die("Error: ". $e->getMessage());
            echo "Ocurrio un error";
            return 0;
        }
        
    }
}



?>