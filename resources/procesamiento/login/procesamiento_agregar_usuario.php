<?php
    require_once "../../model/login_model.php";


    $login_model = new Login_model();

    if (isset($_GET["mode"])) {
        $modo_acceso = htmlentities(addslashes($_GET["mode"]));

    }
   
    $username = htmlentities(addslashes($_POST["username"]));
    
    
    $password = htmlentities(addslashes($_POST["password"]));
    $email = htmlentities(addslashes($_POST["email"]));
    $calle = htmlentities(addslashes($_POST["calle"]));
    $codigo_postal = htmlentities(addslashes($_POST["codigo_postal"]));
    $colonia = htmlentities(addslashes($_POST["colonia"]));
    $telefono = htmlentities(addslashes($_POST["telefono"]));

    


    if ($modo_acceso == "admin") {
        $tipo_usuario = htmlentities(addslashes($_POST["tipo_usuario"]));
        switch($tipo_usuario){
            case "administrador":
                $tipo_usuario = 1;
                break;

            case "cliente":
                $tipo_usuario = 2;
                break;

            default:
                echo "Error en el tipo de usuario";
                break;
        }
    }else{
        $tipo_usuario = htmlentities(addslashes($_GET["tipo_usuario"]));
    }


    $respuesta = $login_model->add_user($username, $password,$email, $tipo_usuario, $codigo_postal,$calle,$colonia,$telefono);
    
    if ($respuesta == "ok") {
    header("location: ../../../public_html/index.php?status=ok&action=add_account");
    die();
     }elseif($respuesta == "error-user_created"){
         header("location: ../../view/login/agregar_usuario_view.php?status=error&action=username_used");
         die();
    
    }else{
        echo "Ocurrio un error";
     } 


?>