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
<body>

    <div class="container centrar_contenido" >
        <h1>Login</h1>
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
        <form action="resources/procesamiento/login/procesamiento_login.php" method="post">
            <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="" id="username" name="username" placeholder="pablito123">
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="text" id="password" name="password">
            <input type="submit" value="Login">
            </div>
        </form>

        <p>¿No tienes una cuenta?</p>
        <a href="resources/view/login/agregar_usuario_view.php">Crear una nueva</a>
            
    </div>
      
        

    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_root.php"
    ?>
   
</body>
</html>