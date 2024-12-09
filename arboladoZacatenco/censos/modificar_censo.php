<?php include("../db.php"); ?>

<?php include("../includes/header.php") ?>

<body>
    
<?php include("../includes/navbar.php") ?>  
      
    <h3 class="center-align"><strong>MODIFICAR DATOS DE UN CENSO</strong></h3>
    
    <div class="row">
        <div class="container">
            <table id="tabla_datos" class="responsive-table centered highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Especie</th>
                        <th>Altura</th>
                        <th>Diametro</th>
                        <th>Condición general</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT id, especie, altura, diametro, condicion FROM censo_arboles; ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['especie'] ?></td>
                            <td><?php echo $row['altura'] ?></td>
                            <td><?php echo $row['diametro'] ?></td>
                            <td><?php echo $row['condicion'] ?></td>
                            <td> <a class="waves-effect waves-light btn modal-trigger green darken-4" href="#MC?id=<?php echo $row['id']; ?>">Modificar estado</a></td>
                            <div id="MC?id=<?php echo $row['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4 class="center-align">Modificación de estado</h4>
                                    <form action="modificar_arbol.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <!-- Sección de Estado -->
                                        <div class="col s5 offset-s1">
                                            
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
                                            style="height: 4em;">Editar Datos
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
    <link rel="stylesheet" href="../css/dropdown.css">

<?php include("../includes/footer.php") ?>
</html>