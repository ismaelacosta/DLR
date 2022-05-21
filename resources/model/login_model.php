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
                if(password_verify($contrasena,$dato["contrasena"])){
                    $login = true;
                    break;
                }
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        return $login;
    }

    public function type_user($username){
        $sql = "SELECT tipo_usuario.tipo_usuario FROM usuario,tipo_usuario WHERE usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND username = :usuario";
        $resultado = $this->db->prepare($sql);

        $resultado->bindValue(":usuario",$username);

        $resultado->execute();

        foreach($resultado as $dato){
            return $dato["tipo_usuario"];
        }

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

    public function add_user($username, $password, $tipo_usuario, $codigo_postal,$calle,$colonia,$telefono){

        $is_empty_username = $this->empty_username($username);

        if($is_empty_username){
            try {

                $password_cifrada = password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
    
                $sql = "INSERT INTO usuario(username,contrasena,calle,codigo_postal,colonia,id_tipo_usuario,telefono) VALUES(?,?,?,?,?,?,?)";
                $preparacion = $this->db->prepare($sql);
                $preparacion->execute([$username,$password_cifrada,$calle,$codigo_postal,$colonia,$tipo_usuario,$telefono]);
    
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