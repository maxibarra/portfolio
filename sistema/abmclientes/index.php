<?php

if (file_exists("data.txt")) {

    $jsonClientes = file_get_contents("data.txt");
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}



$id = isset($_GET["id"]) ? $_GET["id"] : '';

if (isset($_GET["id"]) && isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aClientes[$id]);
    $jsonClientes = json_encode($aClientes);

    file_put_contents("data.txt", $jsonClientes);
}



if ($_POST) {
    $dni = $_POST["txtDni"];
    $nombre = $_POST["txtNombre"];
    $telefono = $_POST["txtTelefono"];
    $correo = $_POST["txtCorreo"];
    $nombreImagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {     
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nombreImagen = $nombreAleatorio. "." .$extension;
        move_uploaded_file($archivo_tmp, "archivos/$nombreImagen");
    }
    
    if (isset($_GET["id"])) {
        //si hay una imagen anterior eliminarla,siempre y cuando se suba una nueva imagen
        $imagenAnterior= $aClientes[$id]["imagen"];

        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){

                if($imagenAnterior != ""){
                unlink("archivos/$imagenAnterior");
            }
        }
        
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK){
            $nombreImagen=$imagenAnterior;
        }

        //actualiza
        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen

        );
    } else {
        //es nuevo
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $nombreImagen
        );
    }





    $jsonClientes = json_encode($aClientes);

    file_put_contents("data.txt", $jsonClientes. "\n");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="txtDni">Dni</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["dni"] : ''; ?>">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["nombre"] : ''; ?>">
                    <label for="txtTelefono">Telefono</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["telefono"] : ''; ?>">
                    <label for="txtCorreo">Correo</label>
                    <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id]) ? $aClientes[$id]["correo"] : ''; ?>">
                    <label for="archivos">Archivo adjunto</label>
                    <input type="file" name="archivo" id="archivo" class="form-control">
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-sm-6 col-12">
                <table class="table border table-hover">
                    <tr>
                        <th>Imagen</th>
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>

                    <?php foreach ($aClientes as $key => $cliente) : ?>

                        <tr>
                            <td><img src="archivos/<?php echo $cliente ["imagen"] ;?> " class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td style="width: 110px;">
                                <a href="index.php?id=<?php echo $key ?>"> <i class="fas fa-edit"></i></a>
                                <a href="index.php?id=<?php echo $key ?>&do=eliminar"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="index.php"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>


    </div>

</body>

</html>