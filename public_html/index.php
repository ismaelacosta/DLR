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
   
    <style>
        .form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  
}

    </style>
    
</head>

<style>
    body{
        background-image: url("https://th.bing.com/th/id/R.fbff3061be1e5fb93e3aec8402061ea3?rik=4LuWwUbOg0HoDg&riu=http%3a%2f%2fgetwallpapers.com%2fwallpaper%2ffull%2ff%2fe%2f7%2f934250-new-pastel-background-images-2560x1440.jpg");
    }
</style>

<body >

    <div class="container centrar_contenido" >
        <br>
        <h1> <img src="https://th.bing.com/th/id/R.c806589295b732b4d13a5b68bbb560a0?rik=iqhl0u4nOvsjkA&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_184513.png&ehk=SewvAmum19vsY7YXrHHH2ZPm%2bboA4S2ENK7Gypz6c3A%3d&risl=&pid=ImgRaw&r=0" height="250" weight="250"> <br> <b>Login</b> </h1> <br>
    </div>

    <?php
        //Lanza la respuesta si el inicio de sesion es incorrecto
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "error" && $_GET["action"] = "login"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </symbol></svg>
            <div class="container"><div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                <div>
                    Usuario o Contraseña incorrectos. Intentelo de nuevo.
                </div>
              </div></div>
              ';
            }

            if($_GET["status"] == "ok" && $_GET["action"] = "add_account"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>

            
                      </svg>';
                    
                echo '<div class="container">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Usuario registrado correctamente. Inicie sesion.
                        </div>
                     </div></div>';
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
                                <font size=4><input type="text" class="" id="username" name="username" placeholder="Usuario"></font>  <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password" class="form-label"><font size="5"> <b>Contraseña</b></font></label>
                            </td>
                            <td>
                                <font size=4><input type="password" id="password" name="password"></font>
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

    

</body >

<footer>
  
<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted"><b><font color="black"> &copy; 2022 DLR </font></b></p>


    <ul class="nav col-md-4 justify-content-end">
      
      <li class="nav-item"><a href="http://localhost/DLR/resources/view/Encabezado/Acerca_De_Nosotros.php" class="nav-link px-2 text-muted"><b><font color="black" size="4">Acerca de nosotros</font></b></a></li>

    </ul>
    
  </footer>

</html>