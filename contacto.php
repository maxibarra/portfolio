<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$pg= "contacto";

include_once("PHPMailer/src/PHPMailer.php");
include_once("PHPMailer/src/SMTP.php");

function guardarCorreo($correo)
{
    $archivo = fopen("mails.txt", "a+");
    fwrite($archivo, $correo . ";\n");
    fclose($archivo);
}
include_once("PHPMailer/src/PHPMailer.php");
include_once("PHPMailer/src/SMTP.php");


if ($_POST) {

    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $asunto = $_POST["txtAsunto"];
    $mensaje = $_POST["txtMensaje"];


   
    if ($nombre != "" && $correo != "") {

        guardarcorreo($correo);


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "mail.maxiibarra.com.ar"; // SMTP a utilizar
        $mail->Username = "info@maxiibarra.com.ar"; // Correo completo a utilizar
        $mail->Password = "M4X1.9798?";
        $mail->Port = 25;
        $mail->From = "info@maxiibarra.com.ar"; //Desde la cuenta donde enviamos
        $mail->FromName = "Maximiliano Ibarra";
        $mail->IsHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Destinatarios
        $mail->addAddress($correo);
        $mail->addBCC("maxi.8379@gmail.com"); //Copia oculta
        $mail->Subject = utf8_decode("Contacto página Web");
        $mail->Body = "Recibimos tu consulta, te responderemos a la brevedad.";
        if (!$mail->Send()) {
            $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        }
        $mail->ClearAllRecipients(); //Borra los destinatarios

        //Envía ahora un correo a nosotros con los datos de la persona
        $mail->addAddress("maxi.8379@gmail.com");
        $mail->Subject = utf8_decode("Recibiste un mensaje desde tu página Web");
        $mail->Body = "Te escribio $nombre cuyo correo es $correo, con el asunto $asunto y el siguiente mensaje:<br><br>$mensaje";

        if ($mail->Send()) { /* Si fue enviado correctamente redirecciona */
            header('Location: confirmacion-envio.php');
        } else {
            $msg = "Error al enviar el correo, intente nuevamente mas tarde.";
        }
    } else {
        $msg = "Complete todos los campos";
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">

        <?php

        include_once("menu.php");

        ?>

        <div class="container contacto">
            <div class="row">
                <div class="col-12 py-sm-5 py-3">
                    <h1>¡Trabajemos Juntos!</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 pb-5">
                    <h2>Para más detalles sobre mi
                        trabajo podés ver mi <a href="https://www.linkedin.com" target="_blank"> Linkedin </a> ,
                        descargar mi <a href="#">CV</a> o mandarme
                        un <a href="contacto.html" target="_blank">mensaje.</a> </h2>
                </div>
            </div>

            <div class="row pb-5 pb-sm-3">
                <div class="col-12">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" required placeholder="Nombre">
                            </div>
                            <div class="col-12  col-md-6 form-group">
                                <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="text" name="txtAsunto" id="txtAsunto" class="form-control" required placeholder="Asunto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <textarea name="txtMensaje" id="txtMensaje" class="form-control" cols="30" rows="10" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" name="btnEnviar" value="ENVIAR" class="btn">
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

<?php

include_once("footer.php");

?>

</html>