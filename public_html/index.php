<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLR (Dulceria Los Roberts)</title>
    <link rel="shortcut icon" href="img/icons/dlr.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<style>
    body{
        background-image: url("https://th.bing.com/th/id/R.fbff3061be1e5fb93e3aec8402061ea3?rik=4LuWwUbOg0HoDg&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2ff%2fe%2f7%2f934250-new-pastel-background-images-2560x1440.jpg&ehk=UJ5LUsz7BOXST4%2fYZ9jxr9t6soXxSdrLCUTF2siXQpA%3d&risl=&pid=ImgRaw&r=0");
    }
</style>

<body>

    <div class="container centrar_contenido" >
        <br>
        <h1> <img src="https://th.bing.com/th/id/R.c806589295b732b4d13a5b68bbb560a0?rik=iqhl0u4nOvsjkA&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_184513.png&ehk=SewvAmum19vsY7YXrHHH2ZPm%2bboA4S2ENK7Gypz6c3A%3d&risl=&pid=ImgRaw&r=0" height="250" weight="250"> <br> <b>Login</b> </h1> <br>
    </div>

    <?php
        //Lanza la respuesta si el inicio de sesion es incorrecto
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "error" && $_GET["action"] = "login"){
                echo "<strong>Usuario o Contraseña incorrectos. Intentelo denuevo</strong>";
            }

            if($_GET["status"] == "ok" && $_GET["action"] = "add_account"){
                echo "<strong>Usuario o Contraseña Registrado. Inicie sesion</strong>";
            }
        }
    ?>

    <div class="container centrar_contenido">
        <form action="../resources/procesamiento/login/procesamiento_login.php" method="post">
        
            <center>
                <div class="mb-3">
                    <table>
                        <tr>
                            <td>
                                <label for="username" class="form-label"> <font size="5"> <b>Nombre de usuario</b></label></font>
                            </td>
                            <td>
                                <font size=4><input type="text" class="" id="username" name="username" placeholder="Pablito123"></font>  <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password" class="form-label"><font size="5"> <b>Contraseña</b></font></label>
                            </td>
                            <td>
                                <font size=4><input type="text" id="password" name="password"></font>
                            </td>
                            <td>
                                <font size=4><input type="submit" value="Login"></font> 
                            </td>
                        </tr>
                    </table>
                
                
                </div>
            </center>
                
            <div class="mb-3">

            </div>
        </form>

        <font size=3><b><p>¿No tienes una cuenta?</p></b></font>
        <a href="../resources/view/login/agregar_usuario_view.php"><b>Crear una nueva</b> </a>
            
    </div>
</body>

<footer>
  
<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted"><b><font color="black"> &copy; 2022 DLR </font></b></p>


    <ul class="nav col-md-4 justify-content-end">
      
      <li class="nav-item"><a href="http://localhost/DLR/resources/view/Encabezado/Acerca_De_Nosotros.php" class="nav-link px-2 text-muted"><b><font color="black" size="4">Acerca de nosotros</font></b></a></li>

    </ul>
    
  </footer>

</html>