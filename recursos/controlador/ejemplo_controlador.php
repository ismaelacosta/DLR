<?php

    require_once "C:/xampp/htdocs/DLR/recursos/modelo/ejemplo_modelo.php";

    class Ejemplo_controller {

        private $modelo;


        function __construct(){
            $this->modelo = new Ejemplo_model();
        }

        public function get_ejemplos(){
            
            $result = $this->modelo->get_ejemplos();

            foreach($result as $dato){
                foreach ($dato as $valor) {
                    echo $valor;
                }
            }
        }


        // lo ideal es recibir una peticion del index, mandar esa peticion al controlador y el controlador tendra la vista enlazaad

    }


?>