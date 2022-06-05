<?php

    class Conectar {
        public static function conexion(){
            $direccion_host = "localhost";
            $contrasena = '5e>zeI^^dZcQr$kS';
            $usuario = "id18959712_roberts";
            $nombre_base_de_datos = "id18959712_dlr";

            try {
                $conexion = new PDO('mysql:host='.$direccion_host.';dbname='.$nombre_base_de_datos, $usuario, $contrasena);
                return $conexion;
            } catch (PDOException $e) {
                die();
            }

        }
    }



?>