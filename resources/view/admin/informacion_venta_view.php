<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la venta</title>
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

        require_once "../../model/admin_model.php";

        $username = $_SESSION["username"];
        $codigo_transaccion = htmlentities(addslashes($_GET["codigo_transaccion"]));

        $administrador_model = new Administrador_model(); 
        $lista_ventas = $administrador_model->get_sale_by_transaction_code($codigo_transaccion);
        $lista_productos = $administrador_model->get_products_from_sale($codigo_transaccion);

?>

<div class="container">
    <table class="table table-info">
    <thead>
        <tr>
        <th scope="col">Codigo Transaccion</th>
        <th scope="col">Fecha de la venta</th>
        <th scope="col">Status</th>
        <th scope="col">Total de la venta</th>
        
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($lista_ventas as $fila) {
            
         ?>
        <tr class="table-light">
            <td><?php echo $fila["codigo_transaccion"];  ?></td>
            <td><?php echo $fila["fecha_venta"]; ?></td>
            <td><?php echo $fila["status"];  ?></td>
            <td><?php echo $fila["total"];  ?></td>
        </tr>

        <?php $contador++; } ?>
    </tbody>
    </table>
</div>

<div class="container centrar_contenido">
    <h2>Lista de productos</h2>
</div>

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
            
        </tr>

        <?php $contador++; } ?>
    </tbody>
    </table>
</div>

<div class="container centrar_contenido">
<a class="btn btn-outline-primary" href="ventas_view.php">
                Volver  
            </a>
</div>



<?php
    include_once "../../templates/footer_administrador.php";

?>

</body>
</html>