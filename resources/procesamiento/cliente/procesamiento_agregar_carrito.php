<?php session_start();
    ini_set('display_errors', 1);
    require_once "../../model/cliente_model.php";
    
    $id_producto = htmlentities(addslashes($_GET["id"]));
    $username = $_SESSION["username"];
    

    $cliente_model = new Cliente_model();

    $respuesta = $cliente_model->add_producto_carrito_cliente($id_producto,$username);
    

   if ($respuesta == "ok") {
         header("location: ../../view/cliente/catalogo_view.php?status=ok&action=producto_agregado_carrito");
            die(); 
        }else if($respuesta == "carrito_duplicado"){
            header("location: ../../view/cliente/catalogo_view.php?status=error&action=producto_carrito_duplicado");
            die(); 
        }else{
            header("location: ../../view/cliente/catalogo_view.php?status=error&action=producto_agregado_carrito");
             die();
    
        }
    


?>