<?php
    require_once "producto_model.php";
    require_once "login_model.php";

    class Cliente_model{
        private $db;
        private $producto_model;
        private $login_model;
    
        public function __construct(){
            $this->db = Conectar::conexion();
            $this->producto_model = new Producto_model();
            $this->login_model = new Login_model();
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


            
    }
        

?>