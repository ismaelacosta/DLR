<?php

    require_once "C:/xampp/htdocs/DLR/resources/model/login_model.php";

    $username = htmlentities(addslashes($_POST["username"]));
    
    $password = htmlentities(addslashes($_POST["password"]));
    
    $login_model = new Login_model();

    $acceso = $login_model->check_user($username, $password);

    if($acceso == true){

        session_start();
        $_SESSION["username"] = $username;

        header("location: ../../view/inicio/inicio_administrador.php");
        die();

    }else{
        header("location: ../../../index.php?status=error&action=login");
        die();
    }


?>