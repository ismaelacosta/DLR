<?php
    require_once "C:/xampp/htdocs/DLR/resources/model/producto_model.php";

    $producto_model = new Producto_model();

    $nombre_producto = htmlentities(addslashes($_POST["nombre_producto"]));
    
    $contenido_piezas = htmlentities(addslashes($_POST["contenido_piezas"]));
    $marca = htmlentities(addslashes($_POST["marca"]));
    $precio = htmlentities(addslashes($_POST["precio"]));
    $existencias = htmlentities(addslashes($_POST["existencias"]));
    $url_imagen = htmlentities(addslashes($_POST["url_imagen"]));


    $respuesta = $producto_model->add_producto($nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$url_imagen);

    if ($respuesta == "ok") {
        header("location: ../../view/producto/agregar_producto_view.php?status=ok&action=producto_creado");
        die();
    }elseif($respuesta == "error"){
        header("location: ../../view/producto/agregar_producto_view.php?status=error&action=producto_no_creado");
        die();
    
    }else{

    } 


?>