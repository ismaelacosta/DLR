<?php
    require_once "../../model/login_model.php";
    ini_set('display_errors', 1);

    $login_model = new Login_model();
   
    $username = htmlentities(addslashes($_POST["username"]));
    
    
    $password = htmlentities(addslashes($_POST["password"]));
    $email = htmlentities(addslashes($_POST["email"]));
    $calle = htmlentities(addslashes($_POST["calle"]));
    $codigo_postal = htmlentities(addslashes($_POST["codigo_postal"]));
    $colonia = htmlentities(addslashes($_POST["colonia"]));
    $telefono = htmlentities(addslashes($_POST["telefono"]));

    if(isset($_GET["tipo_usuario"])){
        $tipo_usuario = htmlentities(addslashes($_GET["tipo_usuario"]));

    }else{
        $tipo_usuario = htmlentities(addslashes($_POST["tipo_usuario"]));
    }

    


    $respuesta = $login_model->add_user($username, $password,$email, $tipo_usuario, $codigo_postal,$calle,$colonia,$telefono);
    
    if ($respuesta == "ok") {
        header("location: ../../../index.php?status=ok&action=add_account");
        die();
     }else {
         header("location: ../../view/login/agregar_usuario_view.php?status=error&action=username_used");
         die();
    }


?>