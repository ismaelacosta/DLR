<?php

require_once "../../config/db_conection.php";

class Producto_model {

    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function add_producto($nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen){
        
        try {
                $sql = "INSERT INTO producto(nombre_producto,contenido_piezas,marca,precio,existencias,url_imagen) VALUES(?,?,?,?,?,?)";
                $preparacion = $this->db->prepare($sql);
                $preparacion->execute([$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen]);
    
                echo "Datos insertados correctamente";
    
                return "ok";
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                return "error";
            } 
    }

    public function get_all_products(){
        $lista_productos = array();
        try {
            $sql = "SELECT * FROM producto";
            $preparacion = $this->db->prepare($sql);
            $preparacion->execute();

            while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                $lista_productos[]=$filas;
            }

            return $lista_productos;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        }
    }


    public function get_product_by_id($id_producto){
        $informacion_producto = array();
        try {
            $sql = "SELECT * FROM producto WHERE id_producto= :producto";
            $preparacion = $this->db->prepare($sql);
            $preparacion->bindValue(":producto",$id_producto);
            $preparacion->execute();

            while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                $informacion_producto[]=$filas;
            }

            return $informacion_producto;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        }
    }

    public function set_producto_by_id($id_producto,$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen){
        try {

            echo $id_producto;

            $sql = "UPDATE producto SET nombre_producto= :nombre_producto, contenido_piezas= :contenido_piezas,marca= :marca,precio= :precio,existencias= :existencias,url_imagen= :url_imagen WHERE id_producto= :id_producto";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":nombre_producto",$nombre_producto);
            $preparacion->bindValue(":contenido_piezas",$contenido_piezas);
            $preparacion->bindValue(":marca",$marca);
            $preparacion->bindValue(":precio",$precio);
            $preparacion->bindValue(":existencias",$existencias);
            $preparacion->bindValue(":url_imagen",$url_imagen);
            $preparacion->bindValue(":id_producto",$id_producto);


            $preparacion->execute();

            echo "Datos Actualizados correctamente";

            return "ok";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        } 
    }

    public function delete_product($id_producto){
        $eliminado = false;
        try {

            $sql = "DELETE FROM producto WHERE id_producto= :producto";
            $resultado = $this->db->prepare($sql);
            $resultado->bindValue(":producto",$id_producto);
            $resultado->execute();

            $eliminado = true;


            return $eliminado;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return $eliminado;
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

    
}



?>