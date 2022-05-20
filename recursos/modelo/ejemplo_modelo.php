<?php

require_once "C:/xampp/htdocs/DLR/recursos/configuracion/conexion_bd.php";

class Ejemplo_model {

    private $db;
    private $ejemplos;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->ejemplos = array();
    }


    public function get_all_ejemplo(){

        $sql = "SELECT * FROM ejemplo";
        $preparacion = $this->db->prepare($sql);
        $preparacion->execute();

        while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
            $this->ejemplos[]=$filas;
        }

        return $this->ejemplos;
    }

    public function remove_ejemplo(){
        
    }


    public function set_ejemplo(){
        
    }


    public function add_ejemplo($nombre, $categoria, $comentarios){
        try {
            $sql = "INSERT INTO ejemplo(nombre,categoria,comentarios) VALUES(?,?,?)";
            $preparacion = $this->db->prepare($sql);
            $preparacion->execute([$nombre,$categoria,$comentarios]);

            echo "Datos insertados correctamente";
        } catch (\Throwable $th) {
            echo "Ocurrio un error inesperado";
        }

    }
}



?>