<?php
    require_once "../../model/producto_model.php";

    $producto_model = new Producto_model();

    $id_producto = htmlentities(addslashes($_GET["id"]));


    $respuesta = $producto_model->delete_product($id_producto);

    if ($respuesta == true) {
        header("location: ../../view/producto/listar_productos_view.php?status=ok&action=producto_eliminado");
        die();
    }elseif($respuesta == false){
        header("location: ../../view/producto/agregar_producto_view.php?status=error&action=producto_no_eliminado");
        die();
    
    }else{

    } 


?>