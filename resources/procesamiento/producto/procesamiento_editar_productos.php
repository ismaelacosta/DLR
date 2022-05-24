<?php
    require_once "../../model/producto_model.php";

    $producto_model = new Producto_model();

    $id_producto = htmlentities(addslashes($_GET["id_producto"]));
    $nombre_producto = htmlentities(addslashes($_POST["nombre_producto"]));
    $descripcion = htmlentities(addslashes($_POST["descripcion"]));
    $contenido_piezas = htmlentities(addslashes($_POST["contenido_piezas"]));
    $marca = htmlentities(addslashes($_POST["marca"]));
    $precio = htmlentities(addslashes($_POST["precio"]));
    $existencias = htmlentities(addslashes($_POST["existencias"]));
    $url_imagen = htmlentities(addslashes($_POST["url_imagen"]));


    $respuesta = $producto_model->set_producto_by_id($id_producto,$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen,$descripcion);

    if ($respuesta == "ok") {
        header("location: ../../view/producto/listar_productos_view.php?status=ok&action=producto_editado");
        die();
    }else if($respuesta == "error"){
        header("location: ../../view/producto/listar_productos_view.php?status=error&action=producto_no_editado");
        die();
    
    }else{

    } 


?>