<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion de la cuenta</title>
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
        require_once "../../model/login_model.php";

        $username = $_SESSION["username"];

        $cliente_model = new Login_model(); 
        $informacion_cuenta = $cliente_model->get_account_information($username);

        foreach ($informacion_cuenta as $dato) {
            echo $dato["username"];
            echo $dato["contrasena"];
            echo $dato["email"];
            echo $dato["calle"];
            echo $dato["colonia"];
            echo $dato["codigo_postal"];
            echo $dato["telefono"];
        }

?>




<?php
    include_once "../../templates/footer_view.php";

?>

</body>
</html>