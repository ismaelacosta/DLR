<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña de la cuenta</title>
    <link rel="stylesheet" href="../../public_html/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../public_html/css/styles.css">
</head>
<body>

    <div class="container centrar_contenido">
        <h1>Cambiar contraseña de la cuenta</h1>
        <br>
        <?php include_once "../config/notification/cliente/avisos.php" ?>
    </div>

    <form action="../procesamiento/cliente/procesamiento_cambiar_contrasena.php" method="post">
    <div class="container">
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Contraseña actual</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" name="password_actual" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" name="password_nueva" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" name="password_verificacion" placeholder="">
        </div>

    </div>

    <div class="container centrar_contenido">
        <div class="row g-3">
            <div class="col-6">
            <input type="submit" class="btn btn-outline-primary" value="Guardar Cambios">
            </div>
            </form>

            <div class="col-6">
                <a href="informacion_cuenta_controller.php?mode=view" class="btn btn-outline-danger">Cancelar</a>
            </div>
        </div>
    </div>


</body>
</html>