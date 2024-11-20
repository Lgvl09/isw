

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
        
        <nav class="light-green darken-1">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
                
            </div>
        </nav>
    </div>
    <h3 class="center-align"><strong>REPORTE DE INCIDENTES DE LA BRIGADA</strong></h3>

    <div class='myswrapper'>
        <form action="subirReporteIncidente.php" method="post">

            <div class='mycontainer'>
                <div class='mycolumn'>
                    <label for="opcion">Selecciona una opción:</label>
                    <select id="opcion" name="opcion" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="Condiciones ambientales adversas">Condiciones ambientales adversas</option>
                        <option value="Accidentes y lesiones">Accidentes y lesiones</option>
                        <option value="Problemas con el equipo">Problemas con el equipo</option>
                        <option value="Conflictos con personas externas">Conflictos con personas externas</option>
                        <option value="Seguridad y emergencias">Seguridad y emergencias</option>
                        <option value="Condiciones de trabajo no optimas">Condiciones de trabajo no optimas</option>
                    </select>
                </div>

                <div class='mycolumn'>
                    <!-- Selección de fecha -->
                    <label for="fecha">Selecciona una fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>

                <div class='mycolumn'>
                    <!-- Selección de hora -->
                    <label for="hora">Selecciona una hora:</label>
                    <input type="time" id="hora" name="hora" required>
                </div>
            </div>

            <div style='padding: 20px'>
                <label style='' for="user-text">Describe el incidente:</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Descripción" required>
            </div>

            <div style='padding: 20px'>
                <label for="user-text">Describe la acción tomada:</label>
                <input type="text" id="accionTomada" name="accionTomada" placeholder="Acción tomada" required>
            </div>
        
            <br>

            <!-- Botón de envío -->
            <div>
                <button class="btn waves-effect waves-light green darken-4" type="submit">Enviar</button>
            </div>
        
        </form>
    </div>

<?php include("includes/footer.php") ?>
</html>