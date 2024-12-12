<nav class="light-green darken-1">
    <div class="navbar-wrapper">
        <div class="nav-wrapper container">
            <a href="../index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
            <ul class="right">
            <li> <!-- class ="active"-->
                <a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a>
            </li>
            <li>
                <a class="dropdown-trigger" href="#!" data-target="dropdown1"><b>Brigadas</b><i class="material-icons right">arrow_drop_down</i></a>
            </li>
            <li>
                <a class="dropdown-trigger" href="#" data-target="censos"><b>Censos</b><i class="material-icons right">arrow_drop_down</i></a>
            </li>
            <li>
                <a class="dropdown-trigger" href="#" data-target="coordinador"><b>Coordinador</b><i class="material-icons right">arrow_drop_down</i></a>
            </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Dropdown options -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="../brigadas/b.html">Voluntarios</a></li>
    <li><a href="#!">Asignar reporte</a></li>
    <li><a href="../brigadas/reporteIncidentes.php">Reporte de incidentes</a></li>
</ul>

    <!-- Dropdown options -->
<ul id="reportes" class="dropdown-content">
    <li><a href="../reportes/reporte.php">Levantar reporte</a></li>
    <li><a href="../reportes/seguimiento_reporte.php">Consultar reportes</a></li>
    <li><a href="../reportes/modificar_estado.php">Modificar estado de reportes</a></li>
    <li><a href="../reportes/monitoreoReporte.php">Monitoreo de reportes</a></li>
</ul> 

<ul id="censos" class="dropdown-content">
    <li><a href="../censos/censo_arbol.php">Registrar arbol</a></li>
    <li><a href="../censos/consultar_censo.php">Consultar censos</a></li>
    <li><a href="../censos/modificar_censo.php">Actualizar censo</a></li>
</ul>

<ul id="coordinador" class="dropdown-content">
    <li><a href="../coordinador/registroCoordinador.php">Registrar coordinadores</a></li>
    <li><a href="../coordinador/registroBrigadistas.php">Registrar brigadistas</a></li>
</ul>