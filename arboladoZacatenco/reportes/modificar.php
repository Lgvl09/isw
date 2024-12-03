<?php
    include("../db.php");

    if(isset($_POST['editar_reporte'])){
        $id = $_GET['id'];
        $nota = $_POST["notas$id"];
        $estado = $_POST['estado'];

        $query = "UPDATE reporte set estado_reporte = '$estado' WHERE id = $id";
        mysqli_query($conn, $query);
        $query = "INSERT INTO estado_reporte(reporte_id, notas) values ('$id', '$nota')";
        mysqli_query($conn, $query);
        header("Location: modificar_estado.php");
    }
?>



