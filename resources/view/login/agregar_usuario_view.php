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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Francois+One&family=Overpass&display=swap');
    td{
        font-family: 'Francois One', sans-serif;
    }
    table{
        font-size:30px;
    }
    input.boton{
        background:pink;
        width:"100";
    }

</style>


<body>
    <?php
        include_once "../../templates/header_view.php";

        //Lanza la respuesta si la creacion de cuenta es incorrecta
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "error" && $_GET["action"] = "username_used"){
                echo "<strong>El usuario que escribio ya es utilizado, intente colocar otro nombre</strong>";
            }
        }

    ?>

    <div class="container centrar_contenido">
        
            <center>
                <form method="POST" action="../../procesamiento/login/procesamiento_agregar_usuario.php">
                <div class="mb-3">
                <table>
                    <tr>
                        <td>
                            <label for="username" class="form-label">Nombre de usuario</label>
                        </td>
                        <td>
                            <input type="text" class="" id="username" name="username" placeholder="Pablito123" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password" class="form-label">Contraseña</label>

                        </td>
                        <td>
                            <input type="password" id="password" name="password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email" class="form-label">Correo electronico</label>
                        </td>
                        <td>
                            <input type="text" id="email" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="codigo_postal" class="form-label">Código postal</label>
                        </td>
                        <td>
                            <input type="text" id="codigo_postal" name="codigo_postal" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="calle" class="form-label">Calle</label>
                        </td>
                        <td>
                            <input type="text" id="calle" name="calle" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="colonia" class="form-label">Colonia</label>
                        </td>
                        <td>
                            <input type="text" id="colonia" name="colonia" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="telefono" class="form-label">Telefono</label>
                        </td>
                        <td>
                            <input type="text" id="telefono" name="telefono" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Crear cuenta" class="boton">
                        </td>
                    </tr>
                </table>
            
        </form></center>
    </div>
    <?php
        include_once "../../templates/footer_view.php";

    ?>
</body>
</html>