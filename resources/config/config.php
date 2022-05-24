<?php
    /*
    Definiendo las rutas del proyecto

            Para agregar estas rutas a los archivos se necesita :

                require_once($_SERVER["DOCUMENT_ROOT"] . "/DLR/resources/config/config.php");
    */

    defined("ROOT_PATH")
        or define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/');

    defined("PUBLIC_HTML_PATH")
        or define("PUBLIC_HTML_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/public_html/');

    defined("CONFIG_PATH")
        or define("CONFIG_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/config/');

    defined("DATABASE_PATH")
        or define("DATABASE_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/config/db_conection.php');

    defined("CSS_PATH")
        or define("CSS_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/public_html/css/');

    defined("IMG_PATH")
        or define("IMG_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/public_html/img/');

    defined("TEMPLATES_PATH")
        or define("TEMPLATES_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/resources/templates/');

    defined("MODELS_PATH")
        or define("MODELS_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/resources/model/');

    defined("PROCESAMIENTO_PATH")
        or define("PROCESAMIENTO_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/resources/procesamiento/');

    defined("VIEWS_PATH")
        or define("VIEWS_PATH", $_SERVER["DOCUMENT_ROOT"] . "/DLR/resources/view/");

    defined("PDF_LIB_PATH")
        or define("PDF_LIB_PATH", $_SERVER["DOCUMENT_ROOT"] . '/DLR/lib/fpdf/');

    ?>
</body>
</html>



