<?php session_start();
     require_once "../../model/admin_model.php";
     $codigo_transaccion = htmlentities(addslashes($_GET["codigo_transaccion"]));
 
     $administrador_model = new Administrador_model();
 
     $verificar_entrega_completada = $administrador_model->complete_delivery($codigo_transaccion);
 
     if ($verificar_entrega_completada) {
         header("location: ../../view/admin/ventas_view.php?&status=ok&action=complete_delivery");
         die(); 
     }else{
        header("location: ../../view/admin/ventas_view.php?&status=error&action=complete_delivery");
         die(); 
     }
?>