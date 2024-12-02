<?php

include ("db.php");

if(isset($_POST['subir_reporte'])){
    $especie = $_POST['especie'];
    $altura = $_POST['altura'];
    $diametro = $_POST['diametro'];
    $condicion = $_POST['condicion'];
    

    $query = "INSERT INTO censo_arboles(especie, altura, diametro, condicion) VALUES (
              '$especie', '$altura', '$diametro', '$condicion');";

    $resultado = mysqli_query($conn, $query);

    if (!$resultado){
        $_SESSION['message'] = "M.toast({html: 'Ocurrió un problema al registrar el arbol'})";
        header("Location: registrar_censo.php");
        die("Query failed");
    }

    $_SESSION['message'] = "M.toast({html: 'Los datos se ha registrado correctamente', displayLength: 8000})";

    header("Location: censo_arbol.php");
}

?>