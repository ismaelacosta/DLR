<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la cuenta</title>
    <link rel="stylesheet" href="../../public_html/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../public_html/css/styles.css">
</head>
<body>

    <div class="container centrar_contenido">
        <h1>Información de la cuenta</h1>
        <br>
        <?php include_once "../config/notification/cliente/avisos.php" ?>
    </div>
    

    <?php
        foreach ($informacion_cuenta as $dato) {
    ?>

    <form action="../procesamiento/cliente/procesamiento_editar_informacion.php" method="post">

    <div class="container centrar_contenido">
        <div class="row g-3">
        <div class="col-12">
            <input type="text" class="form-control" name="username" placeholder="Username"  aria-label="First name" value="<?php echo $dato["username"]; ?>" >
        </div>

        <div class="col-6">
            <input type="text" class="form-control" name="email" placeholder="Correo"  aria-label="First name" value="<?php echo $dato["email"];  ?>">
        </div>
        <div class="col-6">
            <input type="text" class="form-control" name="telefono" placeholder="Telefono" aria-label="Last name" value="<?php echo $dato["telefono"];  ?>">
        </div>
      
        <div class="col-sm-7">
            <input type="text" class="form-control" name="calle" placeholder="Calle" value="<?php echo $dato["calle"];  ?>" aria-label="City">
        </div>
        <div class="col-sm">
            <input type="text" class="form-control" name="colonia" placeholder="Colonia" value="<?php echo $dato["colonia"];  ?>" aria-label="State">
        </div>
        <div class="col-sm">
            <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo postal" value="<?php echo $dato["codigo_postal"];  ?>" aria-label="Zip">
        </div>


            <div class="col-6">
                <input type="submit" class="btn btn-outline-primary" value="Guardar Cambios">
            </div>
            </form>

            <div class="col-6">
                <a href="informacion_cuenta_controller.php?mode=view" class="btn btn-outline-danger">Cancelar</a>
            </div>
            
       
        </div>
    </div>

    <?php }  ?>


</body>
</html>