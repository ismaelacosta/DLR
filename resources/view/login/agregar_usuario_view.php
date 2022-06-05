<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nuevo usuario</title>
    <link rel="shortcut icon" href="../../../img/icons/dlr.png">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/styles.css">
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
      header{
        background-color:rgb(200,191,231);
      }

</style>


<body>

<header>
  <div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="https://dulcerialr.000webhostapp.com/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"> <img src="https://th.bing.com/th/id/R.6d1a09a3d1e96fa89f8b7ce0f3361c63?rik=sYIIlpd0g6QAnA&pid=ImgRaw&r=0" height="50" weight="50"><b>DLR</b><img src="https://th.bing.com/th/id/R.6d1a09a3d1e96fa89f8b7ce0f3361c63?rik=sYIIlpd0g6QAnA&pid=ImgRaw&r=0" height="50" weight="50"> </span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="../Encabezado/Acerca_De_Nosotros.php" class="nav-link"><b><font color="black">Acerca de nosotros</font></b></a></li>        
      </ul>
    </header>
  </div>
</header>

    <?php

        //Lanza la respuesta si la creacion de cuenta es incorrecta
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "error" && $_GET["action"] = "username_used"){
                echo "<strong>El usuario que escribio ya es utilizado, intente colocar otro nombre</strong>";
            }
        }

    ?>

    <div class="container centrar_contenido">
        
            <center>
                <form method="POST" action="../../procesamiento/login/procesamiento_agregar_usuario.php?tipo_usuario=2">
                <div class="mb-3">
                <table>
                    <tr>
                        <td>
                            <label for="username" class="form-label">Nombre de usuario</label>
                        </td>
                        <td>
                            <input type="text" class="" id="username" name="username" placeholder="Genio117" required>
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