<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carrito</title>
    <link rel="shortcut icon" href="../../../public_html/img/icons/dlr.png">
    <link rel="stylesheet" href="../../../public_html/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public_html/css/styles.css">
</head>
<body>
<?php
        //Seguridad acceso al sitio

        session_start();

        if(!isset($_SESSION["username"])){
            //Redirigir al login

            header("Location: ../acceso/acceso_no_autorizado.php");
            die();
        }

        include_once "../../templates/header_view.php";
        require_once "../../model/cliente_model.php";
?>
<div class="centrar_contenido">
<h1>Mi carrito</h1>
</div>

<?php


        //Lanza la respuesta si el inicio de sesion es incorrecto
        if(isset($_GET['status'])  && isset($_GET["action"])){
            if($_GET["status"] == "ok" && $_GET["action"] == "producto_eliminado"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                 </symbol>
              </svg>';
            
        echo '<div class="container">
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Producto eliminado correctamente del carrito.
                </div>
             </div></div>';
            }

            if($_GET["status"] == "error" && $_GET["action"] == "producto_eliminado"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            <div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">

            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>

                <div>
                Ocurrio un error al eliminar el producto del carrito.
                </div>
              </div></div>
              ';
            }
        }
        $username = $_SESSION["username"];
        $producto_model = new Cliente_model(); 
        $lista_productos = $producto_model->get_all_carrito($username);

?>



<div class="container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Descripción</th>
        <th scope="col">Piezas</th>
        <th scope="col">Marca</th>
        <th scope="col">Precio/Unidad</th>
        <th scope="col">Imagen</th>
        <th scope="col">Unidades</th>
        <th scope="col">Total</th>
        <th scope="col" colspan="3" >Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $contador=1;
         foreach ($lista_productos as $fila) {
            
         ?>
        <tr>
            <th scope="row"><?php echo $contador  ?></th>
            <td><?php echo $fila["nombre_producto"];  ?></td>
            <td><?php echo $fila["descripcion"];  ?></td>
            <td><?php echo $fila["contenido_piezas"];  ?></td>
            <td><?php echo $fila["marca"];  ?></td>
            <td><input type="text" id="precio_<?php echo $contador; ?>" value="<?php echo $fila["precio"];?>" disabled/></td>
            <td><?php echo '<img width="50" src="'.$fila["url_imagen"].'">' ?></td>
            <td><input type="text" id="cantidad_a_comprar_<?php echo $contador; ?>" value="1" disabled  ></td>
            <td><input type="text" id="precio_producto_<?php echo $contador; ?>" value="<?php echo $fila["precio"] ?>" disabled></td>
           <!--  <td><?php echo $fila["existencias"];  ?></td>
 -->
            <td></td>
            <td><button id="aumentar_<?php echo $contador ?>" onclick="aumentar(<?php echo $contador ?>,<?php echo $fila['existencias']; ?>)"><img width="40" src="../../../public_html/img/icons/add.jpg" alt=""></button></td>
            <td><button id="disminuir_<?php echo $contador ?>" onclick="disminuir(<?php echo $contador ?>)"><img width="40" src="../../../public_html/img/icons/sub.png" alt=""></button></td>

            <td>
                <a href="../../procesamiento/cliente/procesamiento_eliminar_carrito.php?id=<?php echo $fila["id_producto"];?>">
                    <img width="40" src="../../../public_html/img/icons/delete_icon.webp" alt="">
                </a>
            </td>
               
        </tr>

        <?php $contador++; } ?>
        <tr>
            <input id="contador" type="hidden" value="<?php echo $contador; ?>">
            <td colspan="8">Total a pagar</td>
            <td colspan="2"><input type="text" id="precio_total" value="" disabled/></td>
        </tr>
    </tbody>
    </table>
</div>

<div class="container centrar_contenido">
        <div class="row">
            <div class="col-12">
                <a href="catalogo_view.php">Catalogo</a>
            </div>
        </div>

    </div>


<?php
    include_once "../../templates/footer_view.php";

?>


<script src="../../../public_html/js/script.js"></script>
    
</body>
</html>