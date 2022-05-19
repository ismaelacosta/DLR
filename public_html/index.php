<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLR (Dulceria Los Roberts)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        
        require_once "C:/xampp/htdocs/DLR/recursos/controlador/ejemplo_controlador.php";

        $control = new Ejemplo_controller();

        $control->get_ejemplos();
      

    ?>
</body>
</html>