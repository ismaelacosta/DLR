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
        include_once "C:/xampp/htdocs/DLR/recursos/plantillas/header_vista.php";
        
    ?>

    <?php
        foreach ($lista_ejemplos as $dato) {
            echo $dato["id_ejemplo"]." " . $dato["nombre"]." ". $dato["categoria"]." ". $dato["comentarios"] . "<br>";
        }
    ?>

    <?php
        include_once "C:/xampp/htdocs/DLR/recursos/plantillas/footer_vista.php"
    ?>
</body>
</html>