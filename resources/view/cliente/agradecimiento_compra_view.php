<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por su compra</title>

    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">

</head>

<style>
    table{
        border:4px solid;
        text-align:center;
        padding:4px;
    }
    h1{
        font-size:50px;
    }
    td,tr,th{
        border:4px solid;
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
    ?>

        <?php 
            require_once "../../model/cliente_model.php";
            $Cliente_model = new Cliente_model();
            $productos=$Cliente_model->get_ticket($_SESSION["codigoTransaccion"]);
        ?>

<center>
    <H1>Comprobante de pago</H1> <br>
    <table class="table-success">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr> 
        <?php foreach ($productos as $key) { ?>
        <tr class="table-secondary">
            <td class="table-light"><?php echo $key["nombre_producto"]; ?></td>
            <td class="table-light"><?php echo $key["cantidad_venta"]; ?></td>
            <td class="table-light"><?php echo $key["precio"]; ?></td>
            <td class="table-light"><?php echo $key["Total"]; ?></td>
            <td class="table-light"><?php echo $key["fecha_venta"]; ?></td>
            </tr>
            
        <?php } ?>
</table>
</center>
</body>
</html> 