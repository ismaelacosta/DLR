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
        //Seguridad acceso al sitio

        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "C:/xampp/htdocs/DLR/resources/templates/header_view.php";


        echo "<font size=5>"."Bienvenido: " . $_SESSION["username"]."</font>"."<br><br>";
    ?>

        <center>
            <h2> <font size=10> Menú de opciones</font></h2> <BR>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <a href="#"> <img src="https://th.bing.com/th/id/R.f54a9fa055d4ceec553b51ece7a3d0a2?rik=HyvaX4dCYexl4w&riu=http%3a%2f%2fwww.francescoalbani.com%2fmateriale%2fcart_icon.png&ehk=qnVj0LWoc4HfyerFMSsissFkA9TdjZVr%2fgQKbJnr07I%3d&risl=&pid=ImgRaw&r=0" weidht="300" height="300"> </a> <BR> <font size=5>Catálogo</font> 
                        </td>
                        <td>
                            <a href="#"> <img src="https://www.gaestehaeuser-weinstrasse.de/wp-content/uploads/2020/07/icons5.png" weidht="300" height="300"> </a> <BR> <font size=5>Compras realizadas</font> 
                        </td>
                        <td>
                            <a href="#"> <img src="https://th.bing.com/th/id/R.76654c1ccf9a3d2be9f9894bac07a79b?rik=QBkBlxEFtZrMSw&riu=http%3a%2f%2ficon-icons.com%2ficons2%2f827%2fPNG%2f512%2fuser_icon-icons.com_66546.png&ehk=3sdp0gGBFfN4qR2HRKjXLoNmu6wMTj3hP7ZN1p1IxXo%3d&risl=&pid=ImgRaw&r=0" weidht="300" height="300"> </a> <BR> <font size=5>Información de la cuenta</font> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_view.php";


    ?>
    
</body>
</html>