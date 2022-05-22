<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nuevo usuario</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">
</head>
<body>
    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/header_view.php";

        //Lanza la respuesta si la creacion de cuenta es incorrecta
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "error" && $_GET["action"] = "username_used"){
                echo "<strong>El usuario que escribio ya es utilizado, intente colocar otro nombre</strong>";
            }
        }

    ?>

    <div class="container centrar_contenido">
        <form method="POST" action="../../procesamiento/login/procesamiento_agregar_usuario.php">
            <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="" id="username" name="username" placeholder="pablito123" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <label for="email" class="form-label">Correo electronico</label>
            <input type="text" id="email" name="email" required>

            <label for="codigo_postal" class="form-label">Código postal</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>

            <label for="calle" class="form-label">Calle</label>
            <input type="text" id="calle" name="calle" required>

            <label for="colonia" class="form-label">Colonia</label>
            <input type="text" id="colonia" name="colonia" required>

            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" id="telefono" name="telefono" required>

            <input type="submit" value="Crear cuenta">
            </div>
        </form>
    </div>
    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_view.php";


    ?>
</body>
</html>