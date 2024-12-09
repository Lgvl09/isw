<?php include("../db.php"); ?>

<?php include("../includes/header.php") ?>

<body>

<?php include("../includes/navbar.php") ?>  
      
    <h3 class="center-align"><strong>SEGUIMIENTO DE REPORTES</strong></h3>

    <div class="row">
        <table id="tabla_reportes" class="responsive-table centered highlight">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de reporte</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Descripción</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Estado del reporte</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT id, tipoReporte, latitud, longitud, descripcion, nombre, (aes_decrypt(correo, 'AES')) correo, imagen, fecha, estado_reporte FROM reporte; ";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['tipoReporte'] ?></td>
                        <td><?php echo $row['latitud'] ?></td>
                        <td><?php echo $row['longitud'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['correo'] ?></td>
                        <td><img class="materialboxed" height="30em" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"/></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['estado_reporte'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
    <link rel="stylesheet" href="../css/dropdown.css">

<?php include("../includes/footer.php") ?>
</html>