<?php include("db.php"); ?>

<?php include("includes/header.php") ?>

<body onload="<?php 
    if(isset($_SESSION['message'])){ 
        echo $_SESSION['message'];
    }

    if(isset($_SESSION['message_correo'])){ 
        echo ",";
        echo $_SESSION['message_correo'];
    }

    if(isset($_SESSION['message']) || isset($_SESSION['message_correo'])){
        session_unset();
    }
    ?>">
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
    <h3 class="center-align"><strong>LEVANTAR REPORTE DE ARBOLADO</strong></h3>
    
    <div class="row">
        <div id="map" class="col s12" style="height:30em;"></div>
    </div>
    
    <div class ="row">
        <form action="subir_reporte.php" method="POST" id="report" enctype="multipart/form-data">
            <div class = "container">
                <div class="input-field col s6">
                    <input id="latitud" name="latitud" type="text" class="validate" value="x" readonly>
                    <label for="latitud">Latitud</label>
                </div>
                <div class ="input-field col s6">
                    <input id="longitud" name="longitud" type="text" class="validate" value="x" readonly>
                    <label for="longitud">Longitud</label>
                </div>
            </div>
            <div class = "col s6">
                <div class ="input-field col s10 offset-s2">
                    <i class="bi bi-card-list prefix"></i>
                    <select class="icons" name="tipo" id="tipo" required>
                        <option value="" disabled selected>Escoge una opción</option>
                        <option value="Ramas caídas" data-icon="includes/tree-branch.png">Ramas caídas</option>
                        <option value="Árbol enfermo/plagas" data-icon="includes/bug-fill.svg">Árbol enfermo/plagas</option>
                        <option value="Poda necesaria" data-icon="includes/tree-tools.png">Poda necesaria</option>
                        <option value="Árbol caído" data-icon="includes/tree-fallen.png">Árbol caído</option>
                        <option value="Falta de mantenimiento" data-icon="includes/tree-maintenance.png">Falta de mantenimiento</option>
                        <option value="Otros riesgos potenciales" data-icon="includes/tree-risks.png">Otros riesgos potenciales</option>
                    </select>
                    <label>Tipo de reporte</label>
                </div>
                <div class="input-field col s10 offset-s2">
                    <i class="bi bi-chat-square-fill prefix"></i>
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
                    <label for="descripcion">Descripción del problema</label>
                </div>
                <div class="file-field input-field col s10 offset-s2">
                    <div class="btn green darken-4">
                        <i class="bi bi-image"></i>
                        <input type="file" id="imagen" name="imagen" required accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Sube una fotografía del árbol">
                    </div>
                </div>
            </div>

            <div class="col s4 center-align card panel light-green lighten-4 light-green-text text-darken-3 offset-s1">
                <h4><strong>Datos de contacto</strong></h4>
                <div class="input-field col s10 offset-s1">
                    <i class="bi bi-person-circle prefix"></i>
                    <input placeholder="Introduce tu nombre completo" id="nombre" name="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <i class="bi bi-envelope prefix"></i>
                    <input id="correo" name="correo" type="email" class="validate">
                    <label for="correo">Correo electrónico</label>
                </div>
            </div>

            <div class="col s2 offset-s5">
                <br>
                <button class="btn waves-effect waves-light green darken-4" type="submit" name="subir_reporte"
                style="height: 4em;" value="Submit">Enviar reporte
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </form>


        

    </div>

    <script src="js/brigada.js"></script>
    <link rel="stylesheet" href="css/dropdown.css">


<?php include("includes/footer.php") ?>
</html>