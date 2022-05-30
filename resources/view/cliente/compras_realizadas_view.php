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
        require_once "../../model/cliente_model.php";

        $username = $_SESSION["username"];

        $cliente_model = new Cliente_model(); 
        $lista_productos = $cliente_model->get_customer_purchases($username);

?>

<div class="container">
    <table class="table table-info">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Imagen</th>
        <th scope="col">Unidades compradas</th>
        <th scope="col">Precio por unidad</th>
        <th scope="col">Total</th>
        <th scope="col">Fecha de compra</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $contador = 1;
        foreach ($lista_productos as $fila) {
            
         ?>
        <tr class="table-light">
            <th scope="row"><?php echo $contador ?></th>
            <td><?php echo $fila["nombre_producto"];  ?></td>
            <td><?php echo '<img width="50" src="'.$fila["url_imagen"].'">' ?></td>
            <td><?php echo $fila["cantidad_venta"];  ?></td>
            <td><?php echo $fila["precio"];  ?></td>
            <td><?php echo $fila["total"];  ?></td>
            <td><?php echo $fila["fecha_venta"];  ?></td>
            
        </tr>

        <?php $contador++; } ?>
    </tbody>
    </table>
</div>



<?php
    include_once "../../templates/footer_view.php";

?>

</body>
</html>