<?php session_start();
    require_once "../../model/login_model.php";
    $password_actual = htmlentities(addslashes($_POST["password_actual"]));
    $password_nueva = htmlentities(addslashes($_POST["password_nueva"]));
    $password_verificacion = htmlentities(addslashes($_POST["password_verificacion"]));
    $username = $_SESSION["username"];

    if ($password_nueva != $password_verificacion) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=password&status=error&action=verificacion");
        die(); 
    }

    if ($password_actual == null || $password_nueva == null || $password_verificacion == null) {
        header("location: ../../controller/informacion_cuenta_controller.php?mode=password&status=error&action=vacio");
        die(); 
    }

    $login_model = new Login_model();

    $verificar_password_actual = $login_model->verify_password($password_actual,$username);

    if ($verificar_password_actual) {
        $verificar_actualizacion_password = $login_model->set_password($password_nueva,$username);
        header("location: ../../controller/informacion_cuenta_controller.php?mode=view&status=ok&action=password");
        die(); 
    }else{
        header("location: ../../controller/informacion_cuenta_controller.php?mode=password&status=error&action=verificacion");
        die(); 
    }
  

?>