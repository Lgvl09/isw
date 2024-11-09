<?php
    include("db.php");

    if(isset($_POST['editar_reporte'])){
        $id = $_GET['id'];
        
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $query = "UPDATE reporte set descripcion = '$descripcion', estado_reporte = '$estado' WHERE id = $id";
        mysqli_query($conn, $query);
        header("Location: modificar_estado.php");
    }
?>



