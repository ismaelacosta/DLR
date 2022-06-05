<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi carrito</title>
    <link rel="shortcut icon" href="../../../img/icons/dlr.png">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/styles.css">
</head>
<body>
<?php
      

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
            <td><button id="aumentar_<?php echo $contador ?>" onclick="aumentar(<?php echo $contador ?>,<?php echo $fila['existencias']; ?>)"><img width="40" src="../../../img/icons/add.jpg" alt=""></button></td>
            <td><button id="disminuir_<?php echo $contador ?>" onclick="disminuir(<?php echo $contador ?>)"><img width="40" src="../../..//img/icons/sub.png" alt=""></button></td>

            <td>
                <a href="../../procesamiento/cliente/procesamiento_eliminar_carrito.php?id=<?php echo $fila["id_producto"];?>">
                    <img width="40" src="../../../img/icons/delete_icon.png" alt="">
                </a>
            </td>
               
        </tr>

        <?php $contador++; } ?>
        <tr>
            <input id="unidades" type="hidden" value="">
            <input id="contador" type="hidden" value="<?php echo $contador; ?>">
            <td colspan="8">Total a pagar</td>
            <td colspan="2"><input type="text" id="precio_total" value="" disabled/></td>
        </tr>
    </tbody>
    </table>
</div>

<?php   if ($contador!=1) { ?>
    <div class="container centrar_contenido">
    <div id="paypal-button-container"></div>
    </div>
<?php } ?>




    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZGX4k1C2Ror3qk2Yrl8Hh0clPAnhmMxGNB3ny_UO0vowZznSw1y1ArvciOKXsHub2J0SHe5atoJVeok&currency=MXN"></script>

    <script>
        var lista_unidades_productos = new Array();
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                var precio_total = document.getElementById("precio_total").value;
                var resultado = precio_total.toString();

                
                <?php $lista_unidades = array()  ?>  

                var contador = document.getElementById("contador");
                for (let index = 1; index < contador.value; index++) {
                    elemento = document.getElementById("cantidad_a_comprar_"+index).value;
                    lista_unidades_productos.push(elemento.toString());
                    
                } 
                console.log(lista_unidades_productos); 
                return actions.order.create({
                    "purchase_units": [{

                    "amount": {

                    "currency_code": "MXN",

                    "value": resultado,

                    "breakdown": {

                        "item_total": {  /* Required when including the `items` array */

                        "currency_code": "MXN",

                        "value": resultado

                        }

                    }

                    },

                    "items": [

                        <?php 
                                $elemento = 0;
                                foreach ($lista_productos as $fila) { 
                            ?>
                        {
                            "name": "<?php echo  $fila["nombre_producto"]; ?>", /* Shows within upper-right dropdown during payment approval */
                            "description": "<?php echo  $fila["descripcion"]; ?>", /* Item details will also be in the completed paypal.com transaction view */
                            "unit_amount": {
                            "currency_code": "MXN",
                            "value": "<?php echo  $fila["precio"]; ?>"
                            },
                            "quantity": lista_unidades_productos[<?php echo $elemento; ?>]
                        },

                        <?php $elemento ++; } ?>

                    ]

                    }]

                    });

                    },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                    var unidades = document.getElementById("unidades");

                    for (let index = 0; index < lista_unidades_productos.length; index++) {
                        var element = lista_unidades_productos[index];
                        if((index+1)== lista_unidades_productos.length) {
                            unidades.value = unidades.value+element;
                        }else{
                            unidades.value = unidades.value+element+",";
                        }
                        
                    }

                     window.location="../../procesamiento/cliente/procesamiento_pago.php?codigo_transaccion="+transaction.id+"&lista="+unidades.value;

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');
    </script>



<div class="container centrar_contenido">
        <div class="row">
            
            <div class="col-12">
                <a href="catalogo_view.php"> <img src="https://th.bing.com/th/id/OIP.Rnuqq9SnWz0CsaWycB9kcAHaHa?pid=ImgDet&rs=1" height="200" weidht="200"> </a> <br> <font size=5>Volver al catálogo</font>
            </div>
        </div>

    </div>


<?php
    include_once "../../templates/footer_view.php";

?>


<script src="../../../js/script.js"></script>



    
</body>
</html>