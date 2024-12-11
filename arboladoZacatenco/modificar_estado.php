<?php include("db.php"); ?>

<?php include("includes/header.php") ?>

<body>
    <nav class="light-green darken-1">
        <div class="navbar-wrapper">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
                <ul class="right">
                    <li class="active">
                        <a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown1"><b>Brigadas</b><i
                                class="material-icons right">arrow_drop_down</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dropdown options -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="b.html">Voluntarios</a></li>
        <li><a href="#!">Asignar Reporte</a></li>
    </ul>

        <!-- Dropdown options -->
    <ul id="reportes" class="dropdown-content">
        <li><a href="reporte.php">Levantar reporte</a></li>
        <li><a href="seguimiento_reporte.php">Consultar reportes</a></li>
        <li><a href="modificar_estado.php">Modificar estado de reportes</a></li>
        <li><a href="monitoreoReporte.php">Monitoreo de reportes</a></li>
    </ul>  
    <h3 class="center-align"><strong>MODIFICAR ESTADO DE REPORTES</strong></h3>
    
    
    
    

    <div class="row">
        <div class="container">
            <table id="tabla_estado" class="responsive-table centered highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de reporte</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Estado del reporte</th>
                        <th>Modificar estado</th>
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
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['estado_reporte'] ?></td>
                            <td> <a class="waves-effect waves-light btn modal-trigger green darken-4" href="#ME?id=<?php echo $row['id']; ?>">Modificar estado</a></td>
                            <div id="ME?id=<?php echo $row['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4 class="center-align">Modificación de estado</h4>
                                    <form action="modificar.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- Sección de Estado -->
                                        <div class="col s5 offset-s1">
                                            <div class="input-field">
                                                <br>
                                                <p>
                                                    <label>
                                                        <input name="estado" type="radio" value="Pendiente" <?php echo ($row['estado_reporte'] == 'Pendiente') ? 'checked' : ''; ?> />
                                                        <span class="black-text">Pendiente</span>
                                                    </label>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input name="estado" type="radio" value="En proceso" <?php echo ($row['estado_reporte'] == 'En proceso') ? 'checked' : ''; ?> />
                                                        <span class="black-text">En proceso</span>
                                                    </label>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input name="estado" type="radio" value="Resuelto" <?php echo ($row['estado_reporte'] == 'Resuelto') ? 'checked' : ''; ?> />
                                                        <span class="black-text">Resuelto</span>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Sección de Descripción -->
                                        <div class="col s6">
                                            <div class="input-field">
                                                <i class="bi bi-chat-square-fill prefix"></i>
                                                <textarea id="notas<?php echo $row['id']?>" name="notas<?php echo $row['id']?>" class="materialize-textarea" required data-length="200"></textarea>
                                                <label for="notas<?php echo $row['id']?>">Notas de actualización de estado</label>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col s2 offset-s5">
                                            <br>
                                            <button class="btn waves-effect waves-light green darken-4 btn-small" name="editar_reporte"
                                            style="height: 4em;">Editar
                                            </button>
                                            
                                            <br>
                                            <br> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 
    <link rel="stylesheet" href="css/dropdown.css">

<?php include("includes/footer.php") ?>
</html>