<?php include("../db.php"); ?>

<?php include("../includes/header.php") ?>


<body>
    <?php include("../includes/navbar.php") ?>

    <?php

    // Verificar si hay un mensaje en la sesión y mostrarlo
    if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == 'correo_existente') {
            echo "<script>alert('El correo ya ha sido registrado previamente');</script>";
        } elseif ($_SESSION['message'] == 'error_registrador') {
            echo "<script>alert('El correo del registrador no pertenece a un coordinador superior o no está registrado en la base de datos');</script>";
        } elseif ($_SESSION['message'] == 'registro_exitoso') {
            echo "<script>alert('El registro ha sido exitoso, se ha enviado un correo de confimación al correo registrado');</script>";
        }
        
        // Eliminar el mensaje después de mostrarlo para evitar que se repita en la próxima carga
        unset($_SESSION['message']);
    }
    ?>
    <h3 class="center-align"><strong>REGISTRO DE BRIGADISTAS</strong></h3>

    <div style="width: 50%; margin: 0 auto; padding: 0px; box-sizing: border-box;">
        <div class="row">
            <form class="col s12" action="subirRegistroBrig.php" method="post">
                <!--
                <div class="row">
                    <h4>Coordinador que hace el registro</h4>
                </div>

                <div class="row">
                    <div class="input-field col s5">
                        <i class="material-icons prefix">assignment_ind</i>
                        <input id="registrador" name="registrador" type="text" class="validate" required>
                        <label for="registrador">Ingrese el correo de quien realiza el registro.</label>
                    </div>
                    <div class="input-field col s7">
                        <blockquote>Si el correo no pertenece a un coordinador superior, no se podrá llevar a cabo el registro.</blockquote>
                    </div>
                </div>
                -->
                <div class="row center-align">
                    <h4>Nuevo Brigadista</h4>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person</i>
                        <input id="nombreBrig" name="nombreBrig" type="text" class="validate" >
                        <label for="nombreBrig">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="apellidoBrig" name="apellidoBrig" type="text" class="validate" >
                        <label for="apellidoBrig">Apellido</label>
                    </div>
                    <!--
                    <div class="input-field col s2">
                        <label>
                            <input type="checkbox" class="filled-in" id="coordSuper" name="coordSuper" value="1" />
                            <span>Coordinador Superior</span>
                        </label>
                    </div>
                    -->
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="telefonoBrig" name="telefonoBrig" type="tel" class="validate" >
                        <label for="telefonoBrig">Telefono</label>
                    </div>    
                    <div class ="input-field col s6">
                    <i class="bi bi-card-list prefix"></i>
                        <select class="icons" name="seccionBrig" id="seccionBrig" required>
                            <option value="" disabled selected>Sección a la que pertenece</option>
                            <option value="BIBLIOTECA">BIBLIOTECA</option>
                            <option value="CENLEX">CENLEX</option>
                            <option value="DIRECCIÓN GENERAL">DIRECCIÓN GENERAL</option>
                            <option value="ENCB">ENCB</option>
                            <option value="ESCOM/CIC">ESCOM/CIC</option>
                            <option value="ESFM">ESFM</option>
                            <option value="ESIQUIE">ESIQUIE</option>
                            <option value="ESIT">ESIT</option>
                            <option value="ESIME">ESIME</option>
                            <option value="ESTADIO WILFRIDO MASSIEU">ESTADIO WILFRIDO MASSIEU</option>
                            <option value="UPDCE">UPDCE</option>
                            <option value="VERDE 1">VERDE 1</option>
                        </select>
                    <label>Sección</label>
                </div>
                </div>
                
                <div class="row"> 
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="correoBrig" name="correoBrig" type="email" class="validate" required>
                        <label for="correoBrig">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">password</i>
                        <input id="contrasenaBrig" name="contrasenaBrig" type="password" class="validate">
                        <label for="contrasenaBrig">Contraseña</label>
                    </div>  
                </div>
                <div class="row center-align">
                    <button class="btn waves-effect waves-light green darken-4" type="submit" name="action">Registrar<i class="material-icons right">send</i></button>
                </div>
            </form>
        </div>
    </div>

<?php include("../includes/footer.php") ?>
</html>