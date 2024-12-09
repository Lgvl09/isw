<?php

include("../db.php"); 

// Verificar si los datos fueron enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opcion = $_POST['opcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];
    $accionTomada = $_POST['accionTomada'];

    // Escapar los datos para evitar inyecciones SQL
    $opcion = mysqli_real_escape_string($conn, $opcion);
    $fecha = mysqli_real_escape_string($conn, $fecha);
    $hora = mysqli_real_escape_string($conn, $hora);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);
    $accionTomada = mysqli_real_escape_string($conn, $accionTomada);

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO reporteIncidente (opcion, fecha, hora, descripcion, accionTomada) VALUES ('$opcion', '$fecha', '$hora', '$descripcion', '$accionTomada')";

    // Ejecutar la consulta
    if (mysqli_query($conn, $sql)) {
        echo "¡Datos guardados exitosamente!";
        header("Location: reporteIncidentes.php");
    } else {
        echo "Error al guardar los datos: " . mysqli_error($conn);
    }
}

?>
