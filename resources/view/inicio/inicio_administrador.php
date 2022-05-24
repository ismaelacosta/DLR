<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLR - Inicio - Administrador</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">
</head>

<style>
    td{
        padding:5px;
    }
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

        include_once "../../templates/header_administrador.php";


        echo "<font size=6>"."Bienvenido: " . $_SESSION["username"]. "</font><br><br>";
    ?>
    <center>
        <table>
            <tr>
                <td>
                    <a href="../producto/agregar_producto_view.php"> <img src="https://th.bing.com/th/id/OIP.6ZAO7T4vIUI8LJ1bCAZ9WAHaHa?pid=ImgDet&rs=1" height="200" weight="200"></a> <BR> <font size="5">Registrar nuevo producto</font> 
                </td>
                <td>
                    <a href="../producto/listar_productos_view.php"><img src="https://th.bing.com/th/id/OIP.OxXhWlD77aQFElCFAqQx3gHaHa?pid=ImgDet&rs=1" height="200" weight="200"></a> <BR> <font size="5">Productos a la venta</font>
                </td>
            </tr>
        </table>
    </center>
    

    


    <?php
        include_once "../../templates/footer_administrador.php";


    ?>
    
</body>
</html>