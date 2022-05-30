<?php
    // Necesito el id que recibo del producto y el nombre del usuario agregar
    require_once "../../model/cliente_model.php";

    session_start();

    $codigo_transaccion = htmlentities(addslashes($_GET["codigo_transaccion"]));
    
    $_SESSION["codigoTransaccion"]=$codigo_transaccion;

    $unidades_de_productos = htmlentities(addslashes($_GET["lista"]));
    $resultado = str_replace(","," ",$unidades_de_productos);
    $porciones = explode(" ", $resultado);
    $longitud =  count($porciones);
    $lista_unidades = array();
    for ($i=0; $i < $longitud; $i++) { 
        array_push($lista_unidades,$porciones[$i]);
    }
    $username = $_SESSION["username"];

    $cliente_model = new Cliente_model();

    $lista_productos = $cliente_model->get_all_carrito($username);


    $cliente_model->add_venta($username,$lista_unidades,$lista_productos,$codigo_transaccion);




        if ($respuesta == "ok") {
         header("location: ../../view/cliente/agradecimiento_compra_view.php?status=ok&action=carrito_comprado");
            die(); 
        }/* else if($respuesta == "carrito_duplicado"){
            header("location: ../../view/cliente/catalogo_view.php?status=error&action=producto_carrito_duplicado");
            die(); 
        } */else{
            header("location: ../../view/cliente/agradecimiento_compra_view.php?status=error&action=carrito_comprado");
             die();
        
        } 
    


?>