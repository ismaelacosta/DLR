<?php
// Turn off error reporting 
//comentalo para pruebas en el host de internet
error_reporting(0);
include_once "../config/db_conection.php";
include_once "../../config/db_conection.php";


class Login_model {

    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function get_account_information($username){
        $informacion_cuenta = array();
        $id_usuario = $this->get_id_username_by_username($username);
        try {
            $sql = "SELECT * FROM usuario WHERE id_usuario = :usuario limit 1";
            $preparacion = $this->db->prepare($sql);
            $preparacion->bindValue(":usuario",$id_usuario);
            $preparacion->execute();

            while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                $informacion_cuenta[]=$filas;
            }

            return $informacion_cuenta;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        }
    }

    public function set_username($username_nuevo,$username_actual){
        try {
            $sql = "UPDATE usuario SET username= :usuario_nuevo WHERE username= :usuario_actual";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":usuario_nuevo",$username_nuevo);
            $preparacion->bindValue(":usuario_actual",$username_actual);

            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function set_email($email,$username){
        try {
            $sql = "UPDATE usuario SET email= :correo WHERE username= :usuario";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":correo",$email);
            $preparacion->bindValue(":usuario",$username);
            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function set_calle($calle,$username){
        try {
            $sql = "UPDATE usuario SET calle= :calle WHERE username= :usuario";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":calle",$calle);
            $preparacion->bindValue(":usuario",$username);
            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function set_codigo_postal($codigo_postal,$username){
        try {
            $sql = "UPDATE usuario SET codigo_postal= :codigo_postal WHERE username= :usuario";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":codigo_postal",$codigo_postal);
            $preparacion->bindValue(":usuario",$username);
            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function set_colonia($colonia,$username){
        try {
            $sql = "UPDATE usuario SET colonia= :colonia WHERE username= :usuario";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":colonia",$colonia);
            $preparacion->bindValue(":usuario",$username);
            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function set_telefono($telefono,$username){
        try {
            $sql = "UPDATE usuario SET telefono= :telefono WHERE username= :usuario";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":telefono",$telefono);
            $preparacion->bindValue(":usuario",$username);
            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function encrypt_password($password) {
        $password_cifrada = password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
        return $password_cifrada;
    }

    public function set_password($password_nueva, $username){
        try {

            $password_cifrada = $this->encrypt_password($password_nueva);

            $sql = "UPDATE usuario SET contrasena= :password WHERE username= :username";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":password",$password_cifrada);
            $preparacion->bindValue(":username",$username);
        


            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return false;
        } 
    }

    public function verify_password($password_actual, $username){
        try {
            $sql = "SELECT contrasena FROM usuario WHERE username= :usuario limit 1";
            $resultado = $this->db->prepare($sql);

           $resultado->bindValue(":usuario",$username);

            $resultado->execute();

            foreach ($resultado as $dato) {
                if(password_verify($password_actual,$dato["contrasena"])){
                    return true;
                }
            }

            return false;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        }
    }

    public function username_available($username){
        try {
            $sql = "SELECT id_usuario FROM usuario WHERE username= :usuario limit 1";
            $resultado = $this->db->prepare($sql);

           $resultado->bindValue(":usuario",$usuario);

            $resultado->execute();

            foreach ($resultado as $dato) {
                if($dato["id_usuario"] != null){
                    return false;
                }
            }

            return true;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
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

    public function get_id_username_by_username($username){
        $sql = "SELECT id_usuario FROM usuario WHERE username= :usuario";
        $resultado = $this->db->prepare($sql);

        $resultado->bindValue(":usuario",$username);

        $resultado->execute();

        foreach($resultado as $dato){
            return $dato["id_usuario"];
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

    public function add_user($username, $password,$email, $tipo_usuario, $codigo_postal,$calle,$colonia,$telefono){

        $is_empty_username = $this->empty_username($username);
        echo $is_empty_username;

        if($is_empty_username){
            try {

                $password_cifrada = password_hash($password,PASSWORD_DEFAULT,array("cost"=>12));
    
                $sql = "INSERT INTO usuario(username,contrasena,email,calle,codigo_postal,colonia,telefono,id_tipo_usuario) VALUES(?,?,?,?,?,?,?,?)";
                $preparacion = $this->db->prepare($sql);
                $preparacion->execute([$username,$password_cifrada,$email,$calle,$codigo_postal,$colonia,$telefono,$tipo_usuario]);
    
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