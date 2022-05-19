<?php

require_once "C:/xampp/htdocs/DLR/recursos/configuracion/conexion_bd.php";

class Ejemplo_model {

    private $db;

    function __construct(){
        $this->db = Conectar::conexion();
        $this->ejemplos = array();
    }


    public function get_ejemplos(){

        $preparacion = $this->db->prepare("SELECT * FROM ejemplo;");
        $preparacion->execute();
        $resultado = $preparacion->fetchAll(PDO::FETCH_ASSOC);

        $this->ejemplos = $resultado;

        return $this->ejemplos;
    }
}



?>