<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">

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
        header{
            background-color:rgb(200,191,231);
        }
    </style>
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
        require_once "../../model/producto_model.php";


        //Lanza la respuesta si la creacion de cuenta es incorrecta
        if(isset($_GET['status'])  && isset($_GET["action"])){
            if($_GET["status"] == "ok" && $_GET["action"] == "producto_creado"){
                echo "<strong>Producto agregado correctamente</strong>";
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_no_creado"){
                echo "<strong>Error al crear el producto en la base de datos, intentelo denuevo.</strong>";
            }
        }

        $id_producto = htmlentities(addslashes($_GET["id"]));

        $producto_model = new Producto_model(); 
        $informacion_producto = $producto_model->get_product_by_id($id_producto);

        if($informacion_producto == "error"){
            echo "<strong> Error al cargar la información del producto </strong>";
        }else{
            foreach ($informacion_producto as $producto) {
                
            
    ?>

    <div class="container centrar_contenido">
        <form method="POST" action="../../procesamiento/producto/procesamiento_editar_productos.php?id_producto=<?php echo $producto["id_producto"];?>" enctype="multipart/form-data">
            <div class="mb-3">
            
            <center>
                <table>
                    <tr>
                        <td>
                            <label for="nombre_producto" class="form-label">Nombre Producto</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["nombre_producto"];?>" class="" id="nombre_producto" name="nombre_producto" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="descripcion" class="form-label">Descripción</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["descripcion"];?>" class="" id="descripcion" name="descripcion" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contenido_piezas" class="form-label">Contenido piezas</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["contenido_piezas"];?>"  id="contenido_piezas" name="contenido_piezas" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="marca" class="form-label">Marca</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["marca"];?>" id="marca" name="marca" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="precio" class="form-label">Precio</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["precio"];?>" id="precio" name="precio" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="existencias" class="form-label">Existencias</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $producto["existencias"];?>" id="existencias" name="existencias" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="url_imagen" class="form-label">URL de la imagen del producto</label>
                        </td>
                        <td>
                            <input type="file" value="<?php echo $producto["url_imagen"];?>" id="url_imagen" name="url_imagen">
                        </td>
                        <td>
                            <input type="hidden" value="<?php echo $producto["url_imagen"];?>" id="ruta_imagen" name="ruta_imagen">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Editar producto" class="boton">
                        </td>
                    </tr>
                    
                </table>
            </center>
            
        </form>
    </div>
    <?php
        } // llave del for each
            } // llave del else
        include_once "../../templates/footer_administrador.php";


    ?>
</body>
</html>