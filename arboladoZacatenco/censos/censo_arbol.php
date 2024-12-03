<?php include("../db.php"); ?>

<?php include("../includes/header.php") ?>

<body onload="<?php 
    if(isset($_SESSION['message'])){ 
        echo $_SESSION['message'];
    }

    if(isset($_SESSION['message']) || isset($_SESSION['message_correo'])){
        session_unset();
    }
    ?>">

    <?php include("../includes/navbar.php") ?> 

    <h3 class="center-align"><strong>REGISTRAR DATOS DE UN ARBOL</strong></h3><br><br>
    
    
    
    <div class ="row">
        <form action="registrar_arbol.php" method="POST" id="censof" >
            
            <div class = "col s8 center-align card panel light-green lighten-4 light-green-text text-darken-3 offset-s2">
                <div class="input-field col s10 offset-s1">
                    <input placeholder="Especie" id="especie" name="especie" type="text" class="validate" required>
                    <label for="especie">Especie del arbol</label>
                </div>
                <div class="input-field col s5 offset-s1">
                    <input placeholder="Altura" id="altura" name="altura" type="text" class="validate" required>
                    <label for="altura">Altura</label>
                </div>
                <div class="input-field col s5 ">
                    <input placeholder="Diametro" id="diametro" name="diametro" type="text" class="validate" required>
                    <label for="diametro">Diametro del tronco</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    
                    <textarea id="condicion" name="condicion" class="materialize-textarea" required></textarea>
                    <label for="condicion">Condiciones generales</label>
                </div>
                
            </div>

            

            <div class="col s2 offset-s5">
                <br>
                <button class="btn waves-effect waves-light green darken-4" type="submit" name="subir_reporte"
                style="height: 4em;" value="Submit">REGISTRAR ARBOL
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </form>


        

    </div>

    <script src="../js/brigada.js"></script>
    <link rel="stylesheet" href="../css/dropdown.css">


<?php include("../includes/footer.php") ?>
</html>