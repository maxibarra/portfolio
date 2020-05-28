<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$pg="inicio" ;
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
<section class="inicio">

      <?php

      include_once("menu.php"); 
      
      ?>

        <div class="container">
            <div class="row">
                <div class="col-12col-md-12">
                    <h1>Hola!<br> 
                         bienvenido a mi web
                                </h1>
                   
                    <h2> Maximiliano Ibarra
                        
                    </h2>
                     
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <a href="proyectos.php" target="_blank" class="btn"> Conoce mis proyectos!</a>
                </div>
            </div>
        </div>
    </section>
</body>

<?php

include_once("footer.php");

?>

</html>