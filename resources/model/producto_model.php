<?php

require_once "../../config/db_conection.php";

class Producto_model {

    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function add_producto($nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen,$descripcion){
        
        try {
                $sql = "INSERT INTO producto(nombre_producto,contenido_piezas,marca,precio,existencias,url_imagen,descripcion) VALUES(?,?,?,?,?,?,?)";
                $preparacion = $this->db->prepare($sql);
                $preparacion->execute([$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen,$descripcion]);
    
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

    public function get_all_products_with_existences(){
        $lista_productos = array();
        try {
            $sql = "SELECT * FROM producto where existencias>0";
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

    public function count_all_products(){
        $cantidad;
        try {
            $sql = "SELECT COUNT(id_producto) as dato FROM producto WHERE existencias>0";
            $preparacion = $this->db->prepare($sql);
            $preparacion->execute();

            while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                $cantidad=$filas["dato"];
            }            

            return $cantidad;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return "error";
        }
    }

    public function set_producto_by_id($id_producto,$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen,$descripcion){
        try {

            echo $id_producto;

            $sql = "UPDATE producto SET nombre_producto= :nombre_producto, contenido_piezas= :contenido_piezas,marca= :marca,precio= :precio,existencias= :existencias,url_imagen= :url_imagen,descripcion= :descripcion WHERE id_producto= :id_producto";
            $preparacion = $this->db->prepare($sql);

            $preparacion->bindValue(":nombre_producto",$nombre_producto);
            $preparacion->bindValue(":contenido_piezas",$contenido_piezas);
            $preparacion->bindValue(":marca",$marca);
            $preparacion->bindValue(":precio",$precio);
            $preparacion->bindValue(":existencias",$existencias);
            $preparacion->bindValue(":url_imagen",$url_imagen);
            $preparacion->bindValue(":descripcion",$descripcion);
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
}



?>