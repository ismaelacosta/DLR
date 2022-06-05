<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLR - Inicio - Administrador</title>
    <link rel="shortcut icon" href="../../../img/icons/dlr.png">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/styles.css">
</head>

<style>
    td{
        padding:5px;
    }
</style>

<body>
    

    <?php
     
        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../../templates/header_administrador.php";

    ?>
<div class="container centrar_contenido">
<h1>Menu inicio</h1>
</div>


<?php echo "<font size=6>"."Bienvenido: " . $_SESSION["username"]. "</font><br><br>"; ?>

<div class="container centrar_contenido">
        <div class="row">
            <div class="col-xs-12 col-sm-3"><a href="../producto/agregar_producto_view.php"> <img src="https://th.bing.com/th/id/OIP.6ZAO7T4vIUI8LJ1bCAZ9WAHaHa?pid=ImgDet&rs=1" height="200" weight="200"></a> <BR> <font size="5">Registrar nuevo producto</font>
            </div>
            <div class="col-xs-12 col-sm-3"> <a href="../producto/listar_productos_view.php"><img src="https://th.bing.com/th/id/OIP.OxXhWlD77aQFElCFAqQx3gHaHa?pid=ImgDet&rs=1" height="200" weight="200"></a> <BR> <font size="5">Productos a la venta</font>
            </div>
            <div class="col-xs-12 col-sm-3"><a href="../login/agregar_usuario_admin_view.php"> <img src="../../../img/icons/add_user.jpg" weidht="200" height="200"> </a> <BR> <font size=5>Nuevos usuarios</font> 
            </div>
            <div class="col-xs-12 col-sm-3"><a href="../admin/ventas_view.php"> <img src="../../../img/icons/sales.png" weidht="200" height="200"></a> <BR> <font size=5>Ventas</font> 
            </div>
        </div>
</div>

    

    


    <?php
        include_once "../../templates/footer_administrador.php";


    ?>
    
</body>
</html>