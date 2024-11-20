<?php include("db.php"); ?>

<?php include("includes/header.php") ?>

<body>
<div class="navbar-fixed">
    <ul id="reportes" class="dropdown-content">
        <li><a href="reporte.php">Levantar reporte</a></li>
        <li><a href="seguimiento_reporte.php">Consultar reportes</a></li>
        <li><a href="modificar_estado.php">Modificar estado de reportes</a></li>
    </ul> 
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="b.html">Voluntarios</a></li>
      <li><a href="#!">Asignar Reporte</a></li>
  </ul>
    
    <nav class="light-green darken-1">
        <div class="nav-wrapper container">
            <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
            <ul class="right">
                <li><a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a></li>
                <li class="">
                      <a class="dropdown-trigger" href="#!" data-target="dropdown1"><b>Brigadas</b><i
                              class="material-icons right">arrow_drop_down</i></a>
                  </li>
            </ul>
        </div>
    </nav>
    </div>
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
                            <td> <a class="waves-effect waves-light btn modal-trigger" href="#ME?id=<?php echo $row['id']; ?>">Modificar estado</a></td>
                            <div id="ME?id=<?php echo $row['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Modificación de estado</h4>
                                    <form action="modificar.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                        <div class = "col s6">
                                            <div class ="input-field col s10 offset-s2">
                                                <i class="bi bi-card-list prefix"></i>
                                                <input placeholder="<?php echo $row['estado_reporte']; ?>" id="estado" name="estado" type="text" class="validate">
                                                <label for="nombre">Nombre</label>
                                            </div>
                                            <div class="input-field col s10 offset-s2">
                                                <i class="bi bi-chat-square-fill prefix"></i>
                                                <textarea id="descripcion" name="descripcion" class="materialize-textarea" required><?php echo $row['descripcion'] ?></textarea>
                                                <label for="descripcion">Descripción del problema</label>
                                            </div>
                                        </div>

                                        <div class="col s2 offset-s5">
                                            <br>
                                            <button class="btn waves-effect waves-light green darken-4 btn-small" name="editar_reporte"
                                            style="height: 4em;">Editar
                                            </button>
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