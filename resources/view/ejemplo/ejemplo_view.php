<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Ejemplo</title>
</head>
<body>
    <?php
    error_reporting(0);
        include_once "C:/xampp/htdocs/DLR/resources/templates/header_view.php";
        require_once "C:/xampp/htdocs/DLR/resources/model/ejemplo_model.php";


        if($_GET["status"] == "changes-ok" && $_GET["action"] == "add"){
            echo "Datos Insertados correctamente  <br>";
        }else if($_GET["status"] == "changes-bad" && $_GET["action"] == "add"){
            echo "Ocurrio un error al momnento de insertar los datos  <br>";
        }

        $ejemplo = new Ejemplo_model();
        $lista_ejemplos = $ejemplo->get_all_ejemplo();
        
    ?>

    <?php
        foreach ($lista_ejemplos as $dato) {
            echo $dato["id_ejemplo"]." " . $dato["nombre"]." ". $dato["categoria"]." ". $dato["comentarios"] . "<br>";
        }
    ?>

    <a href="ejemplo_agregar_view.php">Agregar nuevo elemento</a>

    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_view.php"
    ?>
</body>
</html>