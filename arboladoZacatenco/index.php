<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbolado Zacatenco</title>
    <link rel="icon" href="img/tree-fill.svg">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/dropdown.css" />
</head>
<body onload="<?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type'] === "success" ? "light-green darken-4" : "red accent-4"; // Color basado en el tipo
        echo "M.toast({html: '$message', classes: '$message_type'});";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>">

    <nav class="light-green darken-1">
        <div class="navbar-wrapper">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
                <ul class="right">
                    <li> <!-- class ="active"-->
                        <a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a>
                    </li>
                        <?php if(isset($_SESSION['tipoUsuario'])){
                        ?>
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdown1"><b>Brigadas</b><i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                        <?php
                        } ?>
                        <?php if(isset($_SESSION['tipoUsuario']) && strcmp($_SESSION['tipoUsuario'], "coordinador") == 0){
                        ?>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="censos"><b>Censos</b><i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="coordinador"><b>Coordinador</b><i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                        <?php
                        } ?>
                    <li>
                        <?php if(!isset($_SESSION['tipoUsuario'])){
                        ?>
                        <a href="login/indexa.php" class="btn light-green darken-4 waves-effect waves-light">Iniciar sesión</a>
                        <?php
                        } else { ?>
                        <a href="login/cerrar_sesion.php" class="btn red accent-4 waves-effect waves-light">Cerrar sesión</a>
                        <?php
                        } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dropdown options -->
    <ul id="dropdown1" class="dropdown-content">
        <?php if(isset($_SESSION['tipoUsuario']) && strcmp($_SESSION['tipoUsuario'], "coordinador") == 0){
            ?>
        <li><a href="brigadas/vista_brigadas.php">Brigadas existentes</a></li>
        <li><a href="brigadas/b.html">Voluntarios</a></li>
        <?php
        } else if(isset($_SESSION['tipoUsuario']) && strcmp($_SESSION['tipoUsuario'], "brigadista") == 0) { ?>
        <li><a href="brigadas/monitoreoActividades.php">Monitorea tu brigada</a></li>
        <?php
        } ?>
    </ul>

        <!-- Dropdown options -->
    <ul id="reportes" class="dropdown-content">
        <li><a href="reportes/reporte.php">Levantar reporte</a></li>
        <?php if(isset($_SESSION['tipoUsuario']) && strcmp($_SESSION['tipoUsuario'], "coordinador") == 0){
            ?>
        <li><a href="reportes/seguimiento_reporte.php">Seguimiento de reportes</a></li>
            <?php
        } ?>
    </ul> 

    <ul id="censos" class="dropdown-content">
        <li><a href="censos/vista_censos.php">Censos existentes</a></li>
    </ul>

    <ul id="coordinador" class="dropdown-content">
        <li><a href="coordinador/registroCoordinador.php">Registrar coordinadores</a></li>
    </ul>

    <h3 class="center-align" id=""><strong>Arbolado de Zacatenco</strong></h3><br><br>
    <div class="col s7" id="mapa-container" style="height: 74vh; padding-left: 2rem; margin-right: 2rem;">
        <div id="mapaLogin" style="width: 100%; height: 100%;"></div>
    </div>

<?php include("includes/footer.php") ?>
<script>
    // Inicializa el mapa Leaflet
    var mapa = L.map('mapaLogin', {
        center: [19.502166, -99.139326], // Coordenadas de Zacatenco
        zoom: 16,
        zoomControl: true, // Activa los controles de zoom
        dragging: true, // Activa el arrastre
        scrollWheelZoom: true // Activa el zoom con la rueda del mouse
    });

    // Añade un tile layer
    var layer = new L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    // Añade la capa al mapa
    mapa.addLayer(layer);

    // Coordenadas y textos para los marcadores
    const markerData = [
        { coords: [19.502166, -99.139326], text: "Marcador 1" },
        { coords: [19.50066, -99.13977], text: "Marcador 2" },
        { coords: [19.503166, -99.138326], text: "Marcador 3" },
        { coords: [19.501166, -99.137326], text: "Marcador 4" },
        { coords: [19.504166, -99.140326], text: "Marcador 5" },
    ];

    // Añadir los marcadores con eventos
    markerData.forEach((markerInfo) => {
        const marker = L.marker(markerInfo.coords).addTo(mapa);

        // Evento al pasar el mouse sobre el marcador
        marker.on('mouseover', () => {
            marker.bindPopup(markerInfo.text).openPopup();
            console.log(`Mouse sobre: ${markerInfo.text}`);
        });

        // Evento al quitar el mouse del marcador
        marker.on('mouseout', () => {
            marker.closePopup();
        });
    });
</script>

</body>
</html>