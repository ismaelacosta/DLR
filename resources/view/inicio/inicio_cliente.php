<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">

</head>
<style>
    table{
    border-collapse: collapse;
    background-color: rgb(255,255,255);
    width: 50%;
    padding:5px;
    
    }
    th,tr,td{
        border: 5px solid rgb(0, 0, 0);
        padding: 5px;
        text-align: center;
        
    }
    body{
        background-image: url("");
    }
</style>

<body>
    <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/DLR/resources/config/config.php");
        //Seguridad acceso al sitio

        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once TEMPLATES_PATH . "header_view.php";


        echo "<font size=5>"."Bienvenido: " . $_SESSION["username"]."</font>"."<br><br>";
    ?>

        <center>
            <h2> <font size=10> Menú de opciones</font></h2> <BR>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <a href="../cliente/catalogo_view.php"> <img src="https://cdn-icons-png.flaticon.com/512/776/776645.png" weidht="300" height="300"> </a> <BR> <font size=5>Catalogo</font> 
                        </td>
                        <td>
                            <a href="#"> <img src="https://i.pinimg.com/originals/83/d2/1d/83d21d70a88d2c42aec5ec9cce33534b.png" weidht="300" height="300"> </a> <BR> <font size=5>Compras realizadas</font> 
                        </td>
                        <td>
                            <a href="#"> <img src="https://th.bing.com/th/id/OIP.JcyOCcIiAE0TppIu7PkTZgHaHa?pid=ImgDet&rs=1" weidht="300" height="300"> </a> <BR> <font size=5>Información de la cuenta</font> 
                        </td>
                        <td>
                            <a href="../cliente/carrito_view.php"> <img src="https://th.bing.com/th/id/OIP.PX5xd2SXv_0Vd-ivxfw4GQHaHa?pid=ImgDet&rs=1" weidht="300" height="300"></a> <BR> <font size=5>Carrito</font> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
        
    <?php
        include_once TEMPLATES_PATH . "footer_view.php";


    ?>
    
</body>
</html>