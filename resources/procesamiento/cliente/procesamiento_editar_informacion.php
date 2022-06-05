<?php session_start();
    require_once "../../model/login_model.php";

    
    $username_actual = $_SESSION["username"];
    $username = htmlentities(addslashes($_POST["username"]));
    $email = htmlentities(addslashes($_POST["email"]));
    $calle = htmlentities(addslashes($_POST["calle"]));
    $codigo_postal =  htmlentities(addslashes($_POST["codigo_postal"]));
    $colonia = htmlentities(addslashes($_POST["colonia"]));
    $telefono =  htmlentities(addslashes($_POST["telefono"]));

    

    if ($username == null || $email == null || $calle == null || $codigo_postal == null || $colonia == null || $telefono == null) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=vacio");
        die(); 
    }

    $login_model = new Login_model();

    $verificar_username_disponible = $login_model->username_available($username);

    if (!$verificar_username_disponible) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=duplicado");
        die(); 
    }

    if (!$login_model->set_username($username,$username_actual)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=username");
        die(); 
    }

    $_SESSION["username"] = $username;

    if (!$login_model->set_email($email,$username)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=email");
        die(); 
    }

    if (!$login_model->set_calle($calle,$username)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=calle");
        die(); 
    }

    if (!$login_model->set_codigo_postal($codigo_postal,$username)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=codigo_postal");
        die(); 
    }

    if (!$login_model->set_colonia($colonia,$username)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=colonia");
        die(); 
    }

    if (!$login_model->set_telefono($telefono,$username)) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=edit&status=error&action=telefono");
        die(); 
    }

    header("location: ../../controller/informacion_cuenta_controller.php?mode=view&status=ok&action=edit");
        die(); 

    







?>