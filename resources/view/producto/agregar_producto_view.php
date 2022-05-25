<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar nuevo Producto</title>
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
    }

</style>

<body>
    <?php
        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../../templates/header_administrador.php";


        //Lanza la respuesta si la creacion de cuenta es incorrecta
        if(isset($_GET['status'])  || isset($_GET["action"])){
            if($_GET["status"] == "ok" && $_GET["action"] = "producto_creado"){
                echo "<strong>Producto agregado correctamente</strong>";
            }

            if($_GET["status"] == "error" && $_GET["action"] = "producto_no_creado"){
                echo "<strong>Error al crear el producto en la base de datos, intentelo denuevo.</strong>";
            }
        }
    ?>

    <div class="container centrar_contenido">
        <form method="POST" action="../../procesamiento/producto/procesamiento_agregar_producto.php">
     
        </form>
    </div>
    <div class="centrar_contenido">
        <center>
            <table>
                <tr>
                    <td>
                        <label for="nombre_producto" class="form-label">Nombre Producto</label>
                    </td>
                    <td>
                        <input type="text" class="" id="nombre_producto" name="nombre_producto" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcion" class="form-label">Descripción</label>
                    </td>
                    <td>
                        <input type="text" class="" id="descripcion" name="descripcion" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contenido_piezas" class="form-label">Contenido piezas</label>
                    </td>
                    <td>
                        <input type="text" id="contenido_piezas" name="contenido_piezas" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="marca" class="form-label">Marca</label>
                    </td>
                    <td>
                        <input type="text" id="marca" name="marca" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="precio" class="form-label">Precio</label>
                    </td>
                    <td>
                        <input type="text" id="precio" name="precio" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="existencias" class="form-label">Existencias</label>
                    </td>
                    <td>
                        <input type="text" id="existencias" name="existencias" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="url_imagen" class="form-label">URL de la imagen del producto</label>
                    </td>
                    <td>
                        <input type="text" id="url_imagen" name="url_imagen" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> <br>
                        <input type="submit" value="Agregar producto" style="width:100%" class="boton">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> <br>
                         <a  href="listar_productos_view.php"><font size="6"> <b><input type="submit" value="Ir a lista de productos" style="width:100%"  class="boton"></b></font> </a>
                    </td>
                </tr>
            </table>
        </center>
    </div>

    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_administrador.php";


    ?>
</body>
</html>