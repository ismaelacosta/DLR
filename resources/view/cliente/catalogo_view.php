<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="shortcut icon" href="../../../img/icons/dlr.png">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/styles.css">
</head>
<body>
    <?php
        require_once("../../config/config.php");

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
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                         </symbol>
                      </svg>';
                    
                echo '<div class="container">
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                        Producto Agregado correctamente al carrito.
                        </div>
                     </div></div>';
            }


            if($_GET["status"] == "error" && $_GET["action"] == "producto_agregado_carrito"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            <div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">

            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

                <div>
                Ocurrio un error al agregar el producto al carrito.
                </div>
              </div></div>
              ';
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_carrito_duplicado"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            <div class="container"><div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

                <div>
                Producto ya agregado al carrito
                </div>
              </div></div>
              ';
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
        include_once "../../templates/footer_view.php";
    ?>
</body>
</html>