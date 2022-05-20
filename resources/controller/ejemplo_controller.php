<?php
    require_once "C:/xampp/htdocs/DLR/resources/model/ejemplo_model.php";

    $ejemplo = new Ejemplo_model();
    $lista_ejemplos = $ejemplo->get_all_ejemplo();

    require_once "C:/xampp/htdocs/DLR/resources/view/ejemplo/ejemplo_view.php";
?>