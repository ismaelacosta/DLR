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
    body{
        background:URL("https://media.istockphoto.com/vectors/white-grey-abstract-perspective-background-with-soft-toned-hexagonal-vector-id507965448?k=6&m=507965448&s=170667a&w=0&h=JwQUXfECU7QjxPGrsELsUaNj-CWagoUg8PcL1wdXVaI=");
        
    }
    table{
        border:4px solid;
        text-align:center;
    }
    h1{
        font-size:50px;
    }
    td.rosa{
        background-color: rgb(255,182,193);
    }
    th{
        border:4px solid;
        padding:15px;
        font-family: 'Overpass', sans-serif;
        font-size:30PX;
        background-color: rgb(215,215,215);
    }
    td,tr{
        
        padding:15px;
        font-family: 'Overpass', sans-serif;
        font-size:30PX;
    }
    td.TOTAL{
        text-align:right;
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
            $total=$Cliente_model->get_total($_SESSION["codigoTransaccion"]);
        ?>

<center>
    <img src="https://th.bing.com/th/id/R.6d1a09a3d1e96fa89f8b7ce0f3361c63?rik=sYIIlpd0g6QAnA&pid=ImgRaw&r=0" height="300" weight="300">
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
        <tr>
            <td class="rosa"><?php echo $key["nombre_producto"]; ?></td>
            <td><?php echo $key["cantidad_venta"]; ?></td>
            <td class="rosa"><?php echo $key["precio"]; ?></td>
            <td><?php echo $key["Total"]; ?></td>
            <td class="rosa"><?php echo $key["fecha_venta"]; ?></td>
            </tr>
        <?php } ?>
        <tr>
    <?php 
        foreach ($total as $key) {
            echo "<td colspan=5 class=TOTAL><b><font size=6>"."TOTAL: $".$key["Total"]."</font></b></td>";    
        }
    ?>
    </tr>
    <tr>
        <td colspan=5>
            <font size=5>Muchas gracias por comprar en DLR! <br>
            Te invitamos a visitar nuevamente nuestra página ya <br>
             que constantemente agregamos nuevos productos al catálogo
        </font>
        </td>
    </tr>
    
</table>
</center>
</body>
</html> 