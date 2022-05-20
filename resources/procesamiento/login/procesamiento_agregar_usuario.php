<?php
    require_once "C:/xampp/htdocs/DLR/resources/model/login_model.php";

    $login_model = new Login_model();

    $username = htmlentities(addslashes($_POST["username"]));
    
    $password = htmlentities(addslashes($_POST["password"]));


    $respuesta = $login_model->add_user($username, $password);

    if ($respuesta == "ok") {
        header("location: ../../../index.php?status=ok&action=add_account");
        die();
    }elseif($respuesta == "error-user_created"){
        header("location: ../../view/login/agregar_usuario_view.php?status=error&action=username_used");
        die();
    
    }else{

    } 


?>