<?php session_start();
    // Necesito el id que recibo del producto en GET y el nombre del usuario agregar GET
    require_once "../../model/cliente_model.php";

    

    $id_producto = htmlentities(addslashes($_GET["id"]));
    $username = $_SESSION["username"];
    

    $cliente_model = new Cliente_model();

    $respuesta = $cliente_model->remove_producto_carrito_cliente($id_producto,$username);

    if ($respuesta == "ok") {
         header("location: ../../view/cliente/carrito_view.php?status=ok&action=producto_eliminado");
            die(); 
        }else{
            header("location: ../../view/cliente/carrito_view.php?status=error&action=producto_eliminado");
             die();
        
        }
    


?>