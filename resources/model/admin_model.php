<?php
    require_once "producto_model.php";
    require_once "login_model.php";

    class Administrador_model{
        private $db;
        private $producto_model;
        private $login_model;
    
        public function __construct(){
            $this->db = Conectar::conexion();
            $this->producto_model = new Producto_model();
            $this->login_model = new Login_model();
        }

        public function complete_delivery($codigo_transaccion){
            try {
                $sql = "UPDATE venta SET status= 'completado' WHERE codigo_transaccion= :codigo";
                $preparacion = $this->db->prepare($sql);
    
                $preparacion->bindValue(":codigo",$codigo_transaccion);
    
                $preparacion->execute();
    
                echo "Datos Actualizados correctamente";
    
                return true;
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                return false;
            } 
        }

        public function get_all_sales(){
            $lista_ventas = array();
            try {
                $sql = "SELECT venta.id_venta, venta.id_usuario, venta.fecha_venta, venta.codigo_transaccion,venta.status, SUM(informacion_venta.precio*informacion_venta.cantidad_venta) as 'total' FROM venta, informacion_venta WHERE venta.id_venta = informacion_venta.id_venta GROUP BY venta.codigo_transaccion";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->execute();
        
                    while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                        $lista_ventas[]=$filas;
                    }
        
                    return $lista_ventas;
                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    return "error";
            }
        }

        public function get_products_from_sale($codigo_transaccion){
            $lista_productos = array();
                try {
                    $sql = "SELECT informacion_venta.nombre as 'nombre_producto',informacion_venta.url_imagen,informacion_venta.cantidad_venta,informacion_venta.precio,(informacion_venta.precio*informacion_venta.cantidad_venta) as 'total' FROM venta,informacion_venta WHERE informacion_venta.id_venta=venta.id_venta AND venta.codigo_transaccion = :codigo";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":codigo",$codigo_transaccion);
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

        public function get_sale_by_transaction_code($codigo_transaccion){
            $lista_ventas = array();
            try {
                $sql = "SELECT venta.id_venta, venta.id_usuario, venta.fecha_venta, venta.codigo_transaccion,venta.status, SUM(informacion_venta.precio*informacion_venta.cantidad_venta) as 'total' FROM venta, informacion_venta WHERE venta.id_venta = informacion_venta.id_venta AND venta.codigo_transaccion = :codigo";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":codigo",$codigo_transaccion);
                    $preparacion->execute();
        
                    while($filas=$preparacion->fetch(PDO::FETCH_ASSOC)){
                        $lista_ventas[]=$filas;
                    }
        
                    return $lista_ventas;
                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    return "error";
            }
        }

        public function get_sales_information($codigo_transaccion){
            $lista_productos = array();
            try {
                $sql = "SELECT informacion_venta.id_informacion_venta, informacion_venta.id_venta, informacion_venta.id_producto, informacion_venta.status, informacion_venta.cantidad_venta, informacion_venta.nombre as 'nombre_producto', informacion_venta.url_imagen, informacion_venta.precio FROM venta,informacion_venta WHERE venta.id_venta = informacion_venta.id_venta AND venta.codigo_transaccion = :codigo";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":codigo",$codigo_transaccion);
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

        public function get_all_carrito($username){
            $lista_productos = array();
            $id_usuario = $this->login_model->get_id_username_by_username($username);
            try {
                $sql = "SELECT producto.id_producto, producto.nombre_producto, producto.contenido_piezas, producto.marca, producto.precio, producto.existencias, producto.url_imagen, producto.descripcion FROM producto,carrito WHERE carrito.id_usuario = :usuario AND producto.id_producto = carrito.id_producto;";
                $preparacion = $this->db->prepare($sql);
                $preparacion->bindValue(":usuario",$id_usuario);
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

        public function es_duplicado_carrito($id_producto,$id_usuario){
            $es_duplicado = false;
            try {
                $sql = "SELECT COUNT(id_carrito) as cantidad FROM carrito WHERE id_usuario= :usuario AND id_producto= :producto";
                $resultado = $this->db->prepare($sql);
                
                $resultado->bindValue(":usuario",$id_usuario);
                $resultado->bindValue(":producto",$id_producto);
    
                $resultado->execute();
    
                foreach ($resultado as $dato) {
                    if($dato["cantidad"] != null){
                        $es_duplicado=true;
                    }
                }
    
                
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
            return $es_duplicado;
        }

        public function add_venta($username,$lista_unidades,$lista_productos,$codigo_transaccion){
            $id_usuario = $this->login_model->get_id_username_by_username($username);
            
                try {


                    $sql_venta = "INSERT INTO venta(id_usuario,fecha_venta,codigo_transaccion)values (?,CURDATE(),?)";
                    $ejecucion = $this->db->prepare($sql_venta);
                    $ejecucion->execute([$id_usuario,$codigo_transaccion]);

                    $sql_get_id_venta = "SELECT id_venta FROM venta WHERE codigo_transaccion = :codigo";
                    $get_id_venta = $this->db->prepare($sql_get_id_venta);
                    $get_id_venta->bindValue(":codigo",$codigo_transaccion);
                    $get_id_venta->execute();

                    foreach ($get_id_venta as $dato) {
                        $id_venta = $dato["id_venta"];
                        break;
                    }

                    echo $id_venta;

                    $contador = 0;
                    $limite = count($lista_unidades);
                    foreach ($lista_productos as $key) {
                        $sql_informacion = 'INSERT INTO informacion_venta(id_venta,id_producto,status,cantidad_venta,nombre,url_imagen,precio)values(?,?,"pendiente",?,?,?,?)';
                        $preparacion = $this->db->prepare($sql_informacion);
                        $preparacion->execute([$id_venta,$key["id_producto"],$lista_unidades[$contador],$key["nombre_producto"],$key["url_imagen"],$key["precio"]]);
                        $contador++;
                    } 
                    
                    

                    $this->remove_items_from_products($lista_unidades,$lista_productos);
                    $this->remove_carrito($username);
        
                    echo "Datos insertados correctamente";
        
                    return "ok";
                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    return "error";
                } 
            }

        public function remove_items_from_products($lista_unidades,$lista_productos){
            try {
                $contador = 0;
                foreach ($lista_productos as $fila) {
                
                $sql = "UPDATE producto SET existencias=existencias - :existencias WHERE id_producto= :id_producto";
                $preparacion = $this->db->prepare($sql);
    
                $preparacion->bindValue(":existencias",$lista_unidades[$contador]);
                $preparacion->bindValue(":id_producto",$fila["id_producto"]);
    
    
                $preparacion->execute();
    
                echo "Datos Actualizados correctamente";
                $contador++;
                }
    
                return "ok";
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                return "error";
            } 
        } 

        public function remove_carrito($username){
            $id_usuario = $this->login_model->get_id_username_by_username($username);
            try {
    
                $sql = "DELETE FROM carrito WHERE id_usuario= :usuario";
                $preparacion = $this->db->prepare($sql);

                $preparacion->bindValue(":usuario",$id_usuario);
                $preparacion->execute();
    
                echo "Carrito eliminado correctamente";
    
                return "ok";
            } catch (Exception $e) {
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                return "error";
            } 
        }

        public function add_producto_carrito_cliente($id_producto,$username){
            $id_usuario = $this->login_model->get_id_username_by_username($username);
            $es_duplicado = $this->es_duplicado_carrito($id_producto,$id_usuario);

            if($es_duplicado){
                return "carrito_duplicado";
            }else{
                try {
                    
        
                    $sql = "INSERT INTO carrito(id_usuario,id_producto) VALUES(?,?)";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->execute([$id_usuario,$id_producto]);
        
                    echo "Datos insertados correctamente";
        
                    return "ok";
                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    return "error";
                } 
            }

            }

            public function remove_producto_carrito_cliente($id_producto,$username){
                $id_usuario = $this->login_model->get_id_username_by_username($username);
                    try {
                        echo $id_usuario;
                        echo $id_producto;
            
                        $sql = "DELETE FROM carrito WHERE id_producto= :producto AND id_usuario= :usuario";
                        $preparacion = $this->db->prepare($sql);

                        $preparacion->bindValue(":producto",$id_producto);
                        $preparacion->bindValue(":usuario",$id_usuario);
                        $preparacion->execute();
            
                        echo "Elemento eliminado correctamente";
            
                        return "ok";
                    } catch (Exception $e) {
                        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                        return "error";
                    } 
                
    
            }


            public function get_ticket($codigo_transaccion){
                $lista_productos = array();
                
                try {
                    $sql = "SELECT informacion_venta.nombre as 'nombre_producto',informacion_venta.cantidad_venta,informacion_venta.precio,(informacion_venta.precio*informacion_venta.cantidad_venta) as 'Total', venta.fecha_venta FROM venta,informacion_venta WHERE venta.codigo_transaccion= :codigo AND informacion_venta.id_venta=venta.id_venta";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":codigo",$codigo_transaccion);
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


            public function get_customer_purchases($username){
                $lista_productos = array();
                $id_usuario = $this->login_model->get_id_username_by_username($username);
                try {
                    $sql = "SELECT informacion_venta.nombre as 'nombre_producto',informacion_venta.url_imagen,informacion_venta.cantidad_venta,informacion_venta.precio,(informacion_venta.precio*informacion_venta.cantidad_venta) as 'total', venta.fecha_venta FROM venta,informacion_venta WHERE informacion_venta.id_venta=venta.id_venta AND venta.id_usuario= :usuario";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":usuario",$id_usuario);
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
            

            public function get_total($codigo_transaccion){
                $lista_productos = array();
                
                try {
                    $sql = "SELECT SUM(informacion_venta.cantidad_venta*informacion_venta.precio) AS 'Total' FROM venta,informacion_venta WHERE venta.codigo_transaccion= :codigo AND venta.id_venta=informacion_venta.id_venta";
                    $preparacion = $this->db->prepare($sql);
                    $preparacion->bindValue(":codigo",$codigo_transaccion);
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
    }



?>