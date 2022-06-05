<?php session_start();
require_once "../model/login_model_info.php";
    
    if(isset($_GET['mode']) && $_GET["mode"] == "view"){

        //Seguridad acceso al sitio

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../view/acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../templates/header_client_controller.php";

        $username = $_SESSION["username"];

        $cliente_model = new Login_model(); 
        $informacion_cuenta = $cliente_model->get_account_information($username);
       
        require_once "../view/cliente/informacion_cuenta_view.php";

        include_once "../templates/footer_client_controller.php";

    }

    if(isset($_GET['mode']) && $_GET["mode"] == "edit"){

        //Seguridad acceso al sitio
        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../view/acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../templates/header_client_controller.php";

        $username = $_SESSION["username"];

        $cliente_model = new Login_model(); 
        $informacion_cuenta = $cliente_model->get_account_information($username);
       
        require_once "../view/cliente/editar_informacion_cuenta_view.php";

        include_once "../templates/footer_client_controller.php";

    }

    if(isset($_GET['mode']) && $_GET["mode"] == "password"){

        //Seguridad acceso al sitio
        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../view/acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../templates/header_client_controller.php";

        $username = $_SESSION["username"];

        $cliente_model = new Login_model(); 
        $informacion_cuenta = $cliente_model->get_account_information($username);
       
        require_once "../view/cliente/editar_contraseña_view.php";

        include_once "../templates/footer_client_controller.php";

    }


?>