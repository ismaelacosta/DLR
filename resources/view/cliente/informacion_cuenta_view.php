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
    </div>
    

    <?php
        foreach ($informacion_cuenta as $dato) {
    ?>

    <div class="container">
        <div class="row g-3">
        <div class="col-12">
            <input disabled type="text" class="form-control" placeholder="Username"  aria-label="First name" value="<?php echo $dato["username"];  ?>">
        </div>

        <div class="col-6">
            <input disabled type="text" class="form-control" placeholder="Correo"  aria-label="First name" value="<?php echo $dato["email"];  ?>">
        </div>
        <div class="col-6">
            <input disabled type="text" class="form-control" placeholder="Telefono" aria-label="Last name" value="<?php echo $dato["telefono"];  ?>">
        </div>
      
        <div class="col-sm-7">
            <input disabled type="text" class="form-control" placeholder="Calle" value="<?php echo $dato["calle"];  ?>" aria-label="City">
        </div>
        <div class="col-sm">
            <input disabled type="text" class="form-control" placeholder="Colonia" value="<?php echo $dato["colonia"];  ?>" aria-label="State">
        </div>
        <div class="col-sm">
            <input disabled type="text" class="form-control" placeholder="Codigo postal" value="<?php echo $dato["codigo_postal"];  ?>" aria-label="Zip">
        </div>


        <div class="col-6">
        <a href="informacion_cuenta_controller.php?mode=password" class="btn btn-outline-secondary">Cambiar contraseña</a>
            </div>

            <div class="col-6">
                <a href="informacion_cuenta_controller.php?mode=edit" class="btn btn-outline-primary">Modificar información de la cuenta</a>
            </div>
            
       
        </div>
    </div>

    <?php }  ?>


</body>
</html>