<?php include("db.php"); ?>

<?php include("includes/header.php") ?>

<body>
<div class="navbar-fixed">
    <ul id="reportes" class="dropdown-content">
        <li><a href="reporte.php">Levantar reporte</a></li>
        <li><a href="seguimiento_reporte.php">Consultar reportes</a></li>
        <li><a href="modificar_estado.php">Modificar estado de reportes</a></li>
    </ul>  
    
    <nav class="light-green darken-1">
        <div class="nav-wrapper container">
            <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
            <ul class="right">
                <li><a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a></li>
            </ul>
        </div>
    </nav>
</div>
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

<?php include("includes/footer.php") ?>
</html>