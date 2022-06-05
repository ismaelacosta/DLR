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
    $url_imagen = htmlentities(addslashes($_POST["ruta_imagen"]));


    if ($_FILES['url_imagen']["name"] == null) {
        $respuesta = $producto_model->set_producto_by_id_no_image($id_producto,$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$descripcion);

    }else{
        $nombre_imagen = $_FILES['url_imagen']['name'];
    
        $tipo_imagen= $_FILES['url_imagen']['type'];
    
        $tamano_imagen = $_FILES['url_imagen']['size'];
    
        $ruta_bd = 'https://dulcerialr.000webhostapp.com/img/productos/';

	$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/img/productos/';

        $respuesta = $producto_model->set_producto_by_id($id_producto,$nombre_producto,$contenido_piezas,$marca,$precio,$existencias,$ruta_bd.$nombre_imagen,$descripcion);
        move_uploaded_file($_FILES['url_imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
    }


    


    if ($respuesta == "ok") {
        header("location: ../../view/producto/listar_productos_view.php?status=ok&action=producto_editado");
        die();
    }else if($respuesta == "error"){
        header("location: ../../view/producto/listar_productos_view.php?status=error&action=producto_no_editado");
        die();
    
    }else{

    } 
 

?>