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
<body>
    <?php
        //Seguridad acceso al sitio

        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "C:/xampp/htdocs/DLR/resources/templates/header_view.php";


        echo "hola: " . $_SESSION["username"]. "<br><br>";
    ?>


    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_view.php";


    ?>
    
</body>
</html>