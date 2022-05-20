<?php

require_once "C:/xampp/htdocs/DLR/resources/config/db_conection.php";

class Login_model {

    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }


    public function check_user($usuario, $contrasena){

        $login = false;
        try {
            $sql = "SELECT * FROM usuario WHERE username= :usuario";
            $resultado = $this->db->prepare($sql);

           $resultado->bindValue(":usuario",$usuario);
           //$resultado->bindValue(":contrasena",$contrasena);

            $resultado->execute();

            foreach ($resultado as $dato) {
                if(password_verify($contrasena,$dato["password"])){
                    $login = true;
                    break;
                }
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        return $login;
    }


    public function empty_username($usuario){

        $is_empty = true;
        try {
            $sql = "SELECT username FROM usuario WHERE username= :usuario";
            $resultado = $this->db->prepare($sql);
            
            $resultado->bindValue(":usuario",$usuario);

            $resultado->execute();

            foreach ($resultado as $dato) {
                if($dato["username"] != null){
                    $is_empty=false;
                }
            }

            
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        return $is_empty;
    }

    public function add_user($usuario, $contrasena){

        $is_empty_username = $this->empty_username($usuario);

        if($is_empty_username){
            try {

                $password_cifrada = password_hash($contrasena,PASSWORD_DEFAULT,array("cost"=>12));
    
                $sql = "INSERT INTO usuario(username,password) VALUES(?,?)";
                $preparacion = $this->db->prepare($sql);
                $preparacion->execute([$usuario,$password_cifrada]);
    
                echo "Datos insertados correctamente";
    
                return "ok";
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                return "error";
            } 
        }else{
            return "error-user_created";
        }

        

    }
}



?>