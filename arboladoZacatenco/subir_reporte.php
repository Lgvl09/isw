<?php

include ("db.php");

if(isset($_POST['subir_reporte'])){
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $tipoReporte = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $query = "INSERT INTO reporte(tipoReporte, latitud, longitud, descripcion, imagen, nombre, correo) VALUES (
              '$tipoReporte', '$latitud', '$longitud', '$descripcion', '$imagen', '$nombre', aes_encrypt('$correo', 'AES'));";

    $resultado = mysqli_query($conn, $query);

    if (!$resultado){
        $_SESSION['message'] = "M.toast({html: 'Ocurrió un problema al registrar el reporte'})";
        header("Location: reporte.php");
        die("Query failed");
    }

    $_SESSION['message'] = "M.toast({html: 'El reporte se ha registrado correctamente'})";

    /*
    ini_set('SMTP','localhost');
    ini_set('smtp_port', 25);
    $from = "betovegamon@gmail.com";
    $subject = "Reporte de arbolado";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    mail($correo,$from,$message, $headers);
    echo "The email message was sent.";

    $_SESSION['message_correo'] = "M.toast({html: 'Se ha enviado un mensaje a tu correo electrónico'})";
*/

    header("Location: reporte.php");

}

?>