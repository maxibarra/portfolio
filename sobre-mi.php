<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$pg="sobremi";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section>

        <?php

        include_once("menu.php");

        ?>

        </div>



        <div class="container">

            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1>Sobre Mi</h1>
                    <p class="descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste, delectus repellendus nihil, illo ipsam repellat deleniti facere labore animi exercitationem harum architecto nemo quia voluptatem!

                    </p>
                    <a href="#" target="_blank"> <button class="btn-dark"> Descargar CV</button></a>
                </div>
                <div class="col-12 col-sm-6">
                    <img class="foto" src="images/foto3.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid contenedor">
        <div class="row mx-3 justify-content-center">
            <div class="col-12 col-sm-6 cajas  my-1 border bg-light">
                <div>
                    <i class="fas fa-laptop-code fa-4x"></i>
                </div>
                <div>
                    <h4>Lenguajes de Programación</h4>
                </div>
                <div>
                    <p>PHP,Laravel,HTML,CSS,<br>Boostrap,<br>Javascript,jQuery,React.js,<br>MySQL/MariaDB</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 cajas my-1  border bg-light">
                <div>
                    <i class="fas fa-laptop fa-4x"></i>
                </div>
                <div>
                    <h4>Software</h4>
                </div>
                <div>
                    <p> Git,Heidi SQL,Visual Code,XAMPP </p>
                </div>
            </div>
        </div>
        <div class="row mx-3 justify-content-center">
            <div class="col-12 col-sm-6 cajas my-1 border bg-light">
                <div>
                    <i class="fas fa-language fa-4x"></i>
                </div>
                <div>
                    <h4>Idiomas</h4>
                </div>
                <div>
                    <p>Ingles:Basico</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 cajas my-1 border bg-light">
                <div>
                    <i class="fas fa-dice fa-4x"></i>
                </div>
                <div>
                    <h4>Hobbies</h4>
                </div>
                <div>
                    <p>Futbol</p>
                    <p>Videojuegos</p>
                </div>
            </div>

        </div>

    </div>
    <div class="container-fluid experiencia pb-5 pb-sm-3">
        <div class="row">
            <div class="col-12 col-md-12">
                <div>
                    <h2>Experiencia Laboral</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">2011-Presente<br>
                        Buenos Aires
                    </div>
                    <div class="col-12 col-md-4">Nombre del Puesto <br>
                        <h6>Empresa</h6>
                    </div>
                    <div class="col-12 col-md-4">Tareas<br>
                        <h6>XXXXXXXXXXXXXXXXXX</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12  pb-5 pb-sm-3">
                <div>
                    <h2>Experiencia Laboral</h2>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">2011-Presente<br>
                        Buenos Aires
                    </div>
                    <div class="col-12 col-md-4">Nombre del Puesto <br>
                        <h6>Empresa</h6>
                    </div>
                    <div class="col-12 col-md-4">Tareas <br>
                        <h6>XXXXXXXXXXXXXXXXXX </h6>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<?php

include_once("footer.php");

?>




</html>