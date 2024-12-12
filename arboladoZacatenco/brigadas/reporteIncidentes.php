

<?php include("../includes/header.php") ?>

<body>

<?php include("../includes/navbar.php") ?>  
     
    <h3 class="center-align"><strong>REPORTE DE INCIDENTES DE LA BRIGADA</strong></h3>

    <div class="container">
        <form action="subirReporteIncidente.php" method="post">

            <div class="row">
                <div class="col s4">
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

                <div class="col s4">
                    <!-- Selección de fecha -->
                    <label for="fecha">Selecciona una fecha:</label>
                    <input type="text" class="datepicker" id="fecha" name="fecha" required>
                </div>

                <div class="col s4">
                    <!-- Selección de hora -->
                    <label for="hora">Selecciona una hora:</label>
                    <input type="text" class="timepicker" id="hora" name="hora" required>
                </div>
            </div>

            <div style='padding: 20px'>
                <label style='' for="user-text">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Describe el incidente..." required>
            </div>

            <div style='padding: 20px'>
                <label for="user-text">Acción tomada:</label>
                <input type="text" id="accionTomada" name="accionTomada" placeholder="Describe la acción tomada..." required>
            </div>
        
            <br>

            <!-- Botón de envío -->
            <div class="center-align">
                <button class="btn waves-effect waves-light green darken-4" type="submit">Enviar</button>
            </div>
        
        </form>
    </div>

<?php include("../includes/footer.php") ?>
</html>