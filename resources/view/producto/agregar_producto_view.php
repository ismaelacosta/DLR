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
    
            <label for="nombre_producto" class="form-label">Nombre Producto</label>
            <input type="text" class="" id="nombre_producto" name="nombre_producto" required>

            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="" id="descripcion" name="descripcion" required>

            <label for="contenido_piezas" class="form-label">Contenido piezas</label>
            <input type="text" id="contenido_piezas" name="contenido_piezas" required>

            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" required>

            <label for="precio" class="form-label">Precio</label>
            <input type="text" id="precio" name="precio" required>

            <label for="existencias" class="form-label">Existencias</label>
            <input type="text" id="existencias" name="existencias" required>

            <label for="url_imagen" class="form-label">URL de la imagen del producto</label>
            <input type="text" id="url_imagen" name="url_imagen" required>

            <input type="submit" value="Agregar producto">
 
        </form>
    </div>

    <div class="container centrar_contenido">
        <div class="row">
            <div class="col-12">
                <a href="listar_productos_view.php">Lista Producto</a>
            </div>
        </div>

    </div>


    
    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_administrador.php";


    ?>
</body>
</html>