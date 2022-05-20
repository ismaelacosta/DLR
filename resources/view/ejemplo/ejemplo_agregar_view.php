<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/header_view.php";
        
    ?>

    <form method="POST" action="../../procesamiento/ejemplo_agregar.php">
        nombre <input type="text" name="nombre" id="nombre"> <br>
        categoria <input type="text" name="categoria" id="categoria"> <br>
        comentarios <input type="text" name="comentarios" id="comentarios">   <br>

        <input type="submit" value="Agregar">
    </form>


    <?php
        include_once "C:/xampp/htdocs/DLR/resources/templates/footer_view.php"
    ?>
</body>
</html>