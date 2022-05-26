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
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                         </symbol>
                      </svg>';
                    
                echo '<div class="container">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            Producto agregado correctamente.
                        </div>
                     </div></div>';
            }

            if($_GET["status"] == "error" && $_GET["action"] = "producto_no_creado"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            <div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">

            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

                <div>
                Error al crear el producto en la base de datos, intentelo de nuevo.
                </div>
              </div></div>
              ';
            }
        }
    ?>

    <div class="container centrar_contenido">
        
     
        
    </div>
    <div class="centrar_contenido">
        <center>
        <form method="POST" action="../../procesamiento/producto/procesamiento_agregar_producto.php">
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
                </form>
                <tr>
                    <td colspan="2"> <br>
                         <a  href="listar_productos_view.php"><font size="6"> <b><input type="button" value="Ir a lista de productos" style="width:100%"  class="boton"></b></font> </a>
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