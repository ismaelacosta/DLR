<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">

</head>

<style>
    td{
        font-family: 'Overpass', sans-serif;
        font-size:30PX;
    }
    @import url('https://fonts.googleapis.com/css2?family=Overpass&display=swap');
</style>

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

        $id_producto=$_GET["id"];
        $producto_model = new Producto_model(); 
        $producto = $producto_model->get_product_by_id($id_producto);
        
?>

<div class="container">
    <table class="table">

    <tbody>
        <?php
            foreach($producto as $fila) {   
         ?>
        <tr>
            <td colspan=2><center><?php echo '<img width="300" src="'.$fila["url_imagen"].'">' ?></center></td>
        </tr>
        <tr>
            <td>
                 Nombre
            </td>
            <td>
                <?php echo "<font size=5><b>".$fila["nombre_producto"]."</b></font>";  ?>
            </td>
        </tr>
        <tr>
            <td>
                Descripción
            </td>
            <td>
                <?php echo "<font size=5><b>".$fila["descripcion"]."</b></font>";  ?>
            </td>
        </tr>
        <tr>
            <td>
                Contenido en piezas
            </td>
            <td>
                <?php echo "<font size=5><b>".$fila["contenido_piezas"]."</b></font>";  ?>
            </td>
        </tr>
        <tr>
            <td>
                Marca
            </td>
            <td>
                <?php echo "<font size=5><b>".$fila["marca"]."</b></font>";  ?>
            </td>
        </tr>
        <tr>
            <td>
                Precio
            </td>
            <td>
                <?php echo "<font size=5><b>"."$".$fila["precio"]."</b></font>";  ?>
            </td>
        </tr>
        <tr>
            <td>
                Existencia
            </td>
            <td>
                <?php echo "<font size=5><b>".$fila["existencias"]."</b></font>";  ?>
            </td>
        </tr>

        <?php } ?>
    </tbody>

    </table>
</div>

<div class="container centrar_contenido">
<a href="../../procesamiento/cliente/procesamiento_agregar_carrito.php?id=<?php echo $id_producto;?>" class="btn btn-primary">
                                    Agregar al carrito.
                                </a>
</div>


<?php
    include_once "../../templates/footer_administrador.php";

?>
   
</body>
</html>