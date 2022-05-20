<?php

    class Conectar {
        public static function conexion(){

            $direccion_host = "localhost";
            $contrasena = "";
            $usuario = "root";
            $nombre_base_de_datos = "ejemplo";

            try {
                $conexion = new PDO('mysql:host='.$direccion_host.';dbname='.$nombre_base_de_datos, $usuario, $contrasena);
                return $conexion;
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }

        }
    }



?>