<?php include("../db.php"); ?>

<?php include("../includes/header.php") ?>

<style>
    /* Estilo para el círculo con fondo rojo y texto blanco */
    .circular {
        display: inline-block;
        padding: 0.5em 1em;
        color: white; /* Texto blanco */
        font-weight: bold;
        text-align: center;
        font-size: 0.9rem;
        line-height: 1.5em; /* Ajustar la altura para centrar el texto */
    }

    /* Asegurarse de que el span sea un círculo perfecto */
    .circular.red, .circular.green {
        width: 2.5em; /* Ancho fijo */
        height: 2.5em; /* Alto fijo */
        border-radius: 50%; /* Hacerlo circular */
        display: flex;
        justify-content: center;
        align-items: center; /* Centrar el texto */
    }


    .red {
        background-color: red; /* Fondo rojo */
    }

    .green {
        background-color: green; /* Fondo verde */
    }
</style>


<body>
    <?php include("../includes/navbar.php") ?> 

    <h3 class="center-align"><strong>MONITOREO DE ACTIVIDADES DE LA BRIGADA</strong></h3>

    <div style="width: 80%; margin: 0 auto;  padding: 0px; box-sizing: border-box;">
    <div class="row">
        <table id="tabla_monitoreo_reportes" class="responsive-table centered highlight" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de reporte</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Estado del reporte</th>
                    <th>Más de 5 días</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                $alertShown = false; // Variable para controlar si la alerta ya fue mostrada

                $query = "SELECT id, tipoReporte, descripcion, imagen, fecha, estado_reporte FROM reporte; ";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){ 
                    
                    $fechaReporte = strtotime($row['fecha']);
                    $fechaActual = time(); // Fecha y hora actual en formato timestamp
                    $diferenciaDias = floor(($fechaActual - $fechaReporte) / (60 * 60 * 24)); // Diferencia en días

                    // Si hay un reporte con más de 5 días, muestra la alerta solo una vez
                    if ($diferenciaDias > 5 && !$alertShown && $row['estado_reporte']!="Resuelto") {
                        echo '<script> window.onload = function() { alert("Hay reportes con más de 5 días de antigüedad."); }; </script>';
                        $alertShown = true; // Evita que la alerta se muestre más de una vez
                    }

                    ?>
                    
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['tipoReporte'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><img class="materialboxed" height="30em" style="display: block; margin: 0 auto;" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"/></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['estado_reporte'] ?></td>
                        <td style="display: flex; justify-content: center;">
                            <?php 
                                // Condicional para aplicar el color de fondo
                                if($row['estado_reporte']=="Resuelto"){
                                    echo '<span style="display: inline-block; padding: 0.25em 0.5em; background-color: #1b5e20; color: white; font-weight: bold; border-radius: 4px; text-align: center; font-size: 1rem;">Finalizado</span>';
                                }
                                else{
                                    if ($diferenciaDias > 5) {
                                        // Rojo si han pasado más de 5 días
                                        echo '<span class="circular red btn-floating pulse">SI</span>';
                                    } else {
                                        // Verde si no han pasado más de 5 días
                                        echo '<span class="circular green">NO</span>';
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
    </div> 
    <link rel="stylesheet" href="../css/dropdown.css">

<?php include("../includes/footer.php") ?>
</html>