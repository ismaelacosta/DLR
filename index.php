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
        .form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

body{
  
}

header{
        background-color:rgb(200,191,231);
      }


.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  
}

.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      footer{
        background-color:rgb(255,147,255);     
      }

    </style>

    
</head>


<body >

<header>
  <div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"> <img src="https://th.bing.com/th/id/R.6d1a09a3d1e96fa89f8b7ce0f3361c63?rik=sYIIlpd0g6QAnA&pid=ImgRaw&r=0" height="50" weight="50"><b>DLR</b><img src="https://th.bing.com/th/id/R.6d1a09a3d1e96fa89f8b7ce0f3361c63?rik=sYIIlpd0g6QAnA&pid=ImgRaw&r=0" height="50" weight="50"> </span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="resources/view/Encabezado/Acerca_De_Nosotros.php" class="nav-link"><b><font color="black">Acerca de nosotros</font></b></a></li>        
      </ul>
    </header>
  </div>
</header>

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
        <form action="resources/procesamiento/login/procesamiento_login.php" method="post">
        
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
                                <font size=4><input type="password" id="password" name="password" placeholder="Contraseña"></font>
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
        <a href="resources/view/login/agregar_usuario_view.php"><b>Crear una nueva</b> </a>
            
    </div>

    

</body >

<footer>
  
<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted"><b><font color="white"> &copy; 2022 DLR </font></b></p>



    <ul class="nav col-md-4 justify-content-end">
      
      <li class="nav-item"><a href="http://localhost/DLR/resources/view/Encabezado/Acerca_De_Nosotros.php" class="nav-link px-2 text-muted"><b><font color="white">Acerca de nosotros</font></b></a></li>

    </ul>
    
  </footer>
</div>

</html>