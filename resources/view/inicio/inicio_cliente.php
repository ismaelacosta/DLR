<?php session_start(); ini_set('display_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="shortcut icon" href="../../../img/icons/dlr.png">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/styles.css">

</head>
<body>
    <?php

        if(!isset($_SESSION["username"])){
            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        require_once "../../templates/header_view.php";
    ?>

<div class="container centrar_contenido">
<h1>Menu inicio</h1>
</div>

    <div class="container centrar_contenido">
        <div class="row">
            <div class="col-xs-12 col-sm-3"><a href="../cliente/catalogo_view.php"> <img src="https://cdn-icons-png.flaticon.com/512/776/776645.png" weidht="200" height="300"> </a> <BR> <font size=5>Catalogo</font> 
            </div>
            <div class="col-xs-12 col-sm-3"><a href="../cliente/compras_realizadas_view.php"> <img src="https://i.pinimg.com/originals/83/d2/1d/83d21d70a88d2c42aec5ec9cce33534b.png" weidht="300" height="300"> </a> <BR> <font size=5>Compras realizadas</font> 
            </div>
            <div class="col-xs-12 col-sm-3"><a href="../../controller/informacion_cuenta_controller.php?mode=view"> <img src="https://th.bing.com/th/id/OIP.JcyOCcIiAE0TppIu7PkTZgHaHa?pid=ImgDet&rs=1" weidht="300" height="300"> </a> <BR> <font size=5>Información de la cuenta</font> 
            </div>
            <div class="col-xs-12 col-sm-3"><a href="../cliente/carrito_view.php"> <img src="https://th.bing.com/th/id/OIP.PX5xd2SXv_0Vd-ivxfw4GQHaHa?pid=ImgDet&rs=1" weidht="300" height="300"></a> <BR> <font size=5>Carrito</font> 
            </div>
        </div>
    </div>

        
    <?php
        require_once "../../templates/footer_view.php";
    ?>
    
</body>
</html>