<?php session_start();

    require_once "../../model/login_model.php";

    $username = htmlentities(addslashes($_POST["username"]));
    
    $password = htmlentities(addslashes($_POST["password"]));
    
    $login_model = new Login_model();

    $acceso = $login_model->check_user($username, $password);


    if($acceso == true){

        
        $_SESSION["username"] = $username;

        $tipo_acceso = $login_model->type_user($username);

        if($tipo_acceso == "administrador"){
            header("location: ../../view/inicio/inicio_administrador.php");
            die();
        }else{
            header("location: ../../view/inicio/inicio_cliente.php");
            die();
        }
    }else{
        header("location: ../../../index.php?status=error&action=login");
        die();
    }


?>