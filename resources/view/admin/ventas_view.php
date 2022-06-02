<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas realizadas</title>
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
    if(isset($_GET['status'])  && isset($_GET["action"])){
        //verde
        if($_GET["status"] == "ok" && $_GET["action"] == "complete_delivery"){
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>';
                
            echo '<div class="container">
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                    Entrega completada.
                    </div>
                </div></div>';
        }

        //Rojo
        if($_GET["status"] == "error" && $_GET["action"] == "complete_delivery"){
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">

        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

            <div>
            Error al completar la entrega en la base de datos.
            </div>
        </div></div>
        ';
        }
    }

        require_once "../../model/admin_model.php";

        $username = $_SESSION["username"];

        $administrador_model = new Administrador_model(); 
        $lista_ventas = $administrador_model->get_all_sales();

?>

<div class="container">
    <table class="table table-info">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Codigo Transaccion</th>
        <th scope="col">Fecha de la venta</th>
        <th scope="col">Status</th>
        <th scope="col">Total de la venta</th>
        <th scope="col" colspan ="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $contador = 1;
        foreach ($lista_ventas as $fila) {
            
         ?>
        <tr class="table-light">
            <th scope="row"><?php echo $contador ?></th>
            <td><?php echo $fila["codigo_transaccion"];  ?></td>
            <td><?php echo $fila["fecha_venta"]; ?></td>
            <td><?php echo $fila["status"];  ?></td>
            <td><?php echo $fila["total"];  ?></td>
            <td>
            <a class="btn btn-outline-primary" href="informacion_venta_view.php?codigo_transaccion=<?php echo $fila["codigo_transaccion"];?>">
                   Informacion de la venta
                </a>
        </td>
                <td>
                <?php
                if($fila["status"] == "pendiente"){

                
                ?>

                <a class="btn btn-outline-success" href="../../procesamiento/admin/procesamiento_completar_entrega.php?codigo_transaccion=<?php echo $fila["codigo_transaccion"];?>">
                Completar entrega    
            </a>

            <?php
                }
                ?>
                
            </td>
            
        </tr>

        <?php $contador++; } ?>
    </tbody>
    </table>
</div>



<?php
    include_once "../../templates/footer_administrador.php";

?>

</body>
</html>