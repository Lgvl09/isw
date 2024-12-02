<?php include("db.php"); ?>

<?php include("includes/header.php") ?>

<body>

<?php include("includes/navbar.php") ?>  
      
    <h3 class="center-align"><strong>SEGUIMIENTO DE CENSOS</strong></h3>

    <div class="container ">
        <table id="tabla_censos" class="responsive-table centered highlight">
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> 
    <link rel="stylesheet" href="css/dropdown.css">

<?php include("includes/footer.php") ?>
</html>