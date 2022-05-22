<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Productos</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">
</head>
<body>
<?php
        //Seguridad acceso al sitio

        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../../templates/header_view.php";
        require_once "../../model/producto_model.php";

        //Lanza la respuesta si el inicio de sesion es incorrecto
        if(isset($_GET['status'])  && isset($_GET["action"])){
            if($_GET["status"] == "ok" && $_GET["action"] == "producto_eliminado"){
                echo "<strong>Producto eliminado correctamente</strong>";
            }

            if($_GET["status"] == "ok" && $_GET["action"] == "producto_editado"){
                echo "<strong>Producto editado correctamente</strong>";
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_no_eliminado"){
                echo "<strong>Ocurrio un error al eliminar el producto</strong>";
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_no_editado"){
                echo "<strong>Ocurrio un error al editar el producto</strong>";
            }
        }

        $producto_model = new Producto_model(); 
        $lista_productos = $producto_model->get_all_products();

?>

<div class="container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Piezas</th>
        <th scope="col">Marca</th>
        <th scope="col">Precio</th>
        <th scope="col">Existencias</th>
        <th scope="col">Imagen</th>
        <th scope="col" colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista_productos as $fila) {
            
         ?>
        <tr>
            <th scope="row"><?php echo $fila["id_producto"];  ?></th>
            <td><?php echo $fila["nombre_producto"];  ?></td>
            <td><?php echo $fila["contenido_piezas"];  ?></td>
            <td><?php echo $fila["marca"];  ?></td>
            <td><?php echo $fila["precio"];  ?></td>
            <td><?php echo $fila["existencias"];  ?></td>
            <td><?php echo '<img width="50" src="'.$fila["url_imagen"].'">' ?></td>
            <td>
                <a href="../../procesamiento/producto/procesamiento_eliminar_productos.php?id=<?php echo $fila["id_producto"];?>">
                    <img width="40" src="../../../public_html/img/icons/delete_icon.webp" alt="">
                </a>
        </td>
                <td>
                <a href="editar_productos_view.php?id=<?php echo $fila["id_producto"];?>">
                    <img width="40" src="../../../public_html/img/icons/edit_icon.png" alt="">
                </a>
                
            </td>
        </tr>

        <?php } ?>
    </tbody>
    </table>
</div>





    
</body>
</html>