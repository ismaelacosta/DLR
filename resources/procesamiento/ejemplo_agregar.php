<?php


    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $comentarios = $_POST["comentarios"];

    require_once "C:/xampp/htdocs/DLR/resources/model/ejemplo_model.php";

    
    $ejemplo = new Ejemplo_model();
    
    try {
        $lista_ejemplos = $ejemplo->add_ejemplo($nombre, $categoria, $comentarios);
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        header("Location: ../view/ejemplo/ejemplo_view.php?status=changes-ok&action=add");
    
    exit();
    } catch (\Throwable $th) {
        header("Location: ../view/ejemplo/ejemplo_view.php?status=changes-bad&action=add");
    }
    
    


?>