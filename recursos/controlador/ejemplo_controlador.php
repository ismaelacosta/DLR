<?php
    require_once "C:/xampp/htdocs/DLR/recursos/modelo/ejemplo_modelo.php";

    $ejemplo = new Ejemplo_model();
    $lista_ejemplos = $ejemplo->get_all_ejemplo();

    require_once "C:/xampp/htdocs/DLR/recursos/vista/ejemplo_view.php";
?>