<?php include("db.php"); ?>
<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>
<?php
$correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; // Recuperar el correo desde la sesión?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Brigadasxd</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/brigada.css">
    <style>
       body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn {
            background-color: #388e3c !important; /* Color de la barra de navegación */
        }

        form {
            width: 100%; /* Asegura que el formulario ocupe todo el ancho disponible */
        }
    </style>
</head>


<body>
<?php
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type'] === "success" ? "green" : "red"; // Color basado en el tipo
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                M.toast({html: '$message', classes: '$message_type'});
            });
        </script>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <!-- Nav Bar -->
    <nav class="light-green darken-1">
        <div class="navbar-wrapper">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><i class="bi bi-house-door-fill"></i></a>
                <ul class="right">
                    <li><a href="#" class="dropdown-trigger" data-target="reportes"><b>Reportes<i class="material-icons right">arrow_drop_down</i></b></a></li>
                    <li class="active">
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

    <ul id="reportes" class="dropdown-content">
        <li><a href="reporte.php">Levantar reporte</a></li>
        <li><a href="seguimiento_reporte.php">Consultar reportes</a></li>
        <li><a href="modificar_estado.php">Modificar estado de reportes</a></li>
    </ul>
    <div class="page-title">
      <h1>¿FORMAS PARTE DEL EQUIPO?</h1>
    </div>

    <!-- Main content -->
    <div class="main-container">
        <form action="login.php" method="POST" enctype="multipart/form-data">
            <h5 class="center-align"><b>Inicia sesión</b></h5>    

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name = "correo" type="email" class="validate" required value="<?php echo htmlspecialchars($correo); ?>">
                    <label for="email">Correo Electrónico</label>
                    <span class="helper-text" data-error="Correo no válido" data-success="Válido">Ejemplo: usuario@correo.com</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name = "contrasena" type="password" class="validate" required>
                    <label for="password">Contraseña</label>
                    <span class="helper-text" data-error="Campo requerido" data-success="Válido">Mínimo 8 caracteres</span>
                </div>
            </div>
            <div class="row">
                <div class="center-align col s12">
                    <button class="btn waves-effect waves-light " type="submit" name="action">Iniciar Sesión
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/brigada.js"></script>
</body>

</html>
