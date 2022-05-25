<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carrito</title>
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

        include_once "../../templates/header_administrador.php";
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
        <th scope="col">Descripción</th>
        <th scope="col">Piezas</th>
        <th scope="col">Marca</th>
        <th scope="col">Precio/Unidad</th>
        <th scope="col">Imagen</th>
        <th scope="col">Unidades</th>
        <th scope="col">Total</th>
        <th scope="col" colspan="3" >Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $contador=1;
         foreach ($lista_productos as $fila) {
            
         ?>
        <tr>
            <th scope="row"><?php echo $fila["id_producto"];  ?></th>
            <td><?php echo $fila["nombre_producto"];  ?></td>
            <td><?php echo $fila["descripcion"];  ?></td>
            <td><?php echo $fila["contenido_piezas"];  ?></td>
            <td><?php echo $fila["marca"];  ?></td>
            <td><input type="text" id="precio_<?php echo $contador; ?>" value="<?php echo $fila["precio"];?>" disabled/></td>
            <td><?php echo '<img width="50" src="'.$fila["url_imagen"].'">' ?></td>
            <td><input type="text" id="cantidad_a_comprar_<?php echo $contador; ?>" value="1" disabled  ></td>
            <td><input type="text" id="precio_producto_<?php echo $contador; ?>" value="<?php echo $fila["precio"] ?>" disabled></td>
           <!--  <td><?php echo $fila["existencias"];  ?></td>
 -->
            <td></td>
            <td><button id="aumentar_<?php echo $contador ?>" onclick="aumentar(<?php echo $contador ?>,<?php echo $fila['existencias']; ?>)"><img width="40" src="../../../public_html/img/icons/add.jpg" alt=""></button></td>
            <td><button id="disminuir_<?php echo $contador ?>" onclick="disminuir(<?php echo $contador ?>)"><img width="40" src="../../../public_html/img/icons/sub.png" alt=""></button></td>

            <td>
                <a href="../../procesamiento/producto/procesamiento_eliminar_productos.php?id=<?php echo $fila["id_producto"];?>">
                    <img width="40" src="../../../public_html/img/icons/delete_icon.webp" alt="">
                </a>
            </td>
               
        </tr>

        <?php $contador++; } ?>
        <tr>
            <input id="contador" type="hidden" value="<?php echo $contador; ?>">
            <td colspan="8">Total a pagar</td>
            <td colspan="2"><input type="text" id="precio_total" value="" disabled/></td>
        </tr>
    </tbody>
    </table>
</div>

<div class="container centrar_contenido">
        <div class="row">
            <div class="col-12">
                <a href="catalogo_view.php">Catalogo</a>
            </div>
        </div>

    </div>


<?php
    include_once "../../templates/footer_administrador.php";

?>


<script src="../../../public_html/js/script.js"></script>
    
</body>
</html>