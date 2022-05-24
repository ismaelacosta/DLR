<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">
</head>
<body>
    <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/DLR/resources/config/config.php");

        //Seguridad acceso al sitio
        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login
            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once TEMPLATES_PATH . "header_view.php";
        require_once "../../model/producto_model.php";

        //Lanza la respuesta si el inicio de sesion es incorrecto
        if(isset($_GET['status'])  && isset($_GET["action"])){
            if($_GET["status"] == "ok" && $_GET["action"] == "producto_agregado_carrito"){
                echo "<strong>Producto Agregado correctamente al carrito</strong>";
            }


            if($_GET["status"] == "error" && $_GET["action"] == "producto_agregado_carrito"){
                echo "<strong>Ocurrio un error al agregar el producto al carrito</strong>";
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_carrito_duplicado"){
                echo "<strong>Producto ya agregado al carrito</strong>";
            }

        }

        $producto_model = new Producto_model(); 
        $lista_productos = $producto_model->get_all_products_with_existences();
        $cantidad_productos = $producto_model->count_all_products();
        
    ?>

    

    <div class="container">
        <div class="row">
            <?php 
                

                foreach ($lista_productos as $fila) { ?>
                <div class="col-sm-3 col-xs-12">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $fila["url_imagen"];  ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?php echo $fila["descripcion"];  ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="informacion_del_producto_view.php?id=<?php echo $fila["id_producto"];?>" class="btn btn-primary">
                                    Información del producto.
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="../../procesamiento/cliente/procesamiento_agregar_carrito.php?id=<?php echo $fila["id_producto"];?>" class="btn btn-primary">
                                    Agregar al carrito.
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>

    <?php 
        include_once TEMPLATES_PATH  . "footer_view.php";
    ?>
</body>
</html>