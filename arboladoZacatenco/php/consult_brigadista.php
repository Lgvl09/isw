
<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';

    if (empty($correo)) {
        echo json_encode(['error' => 'Por favor, introduce un correo.']);
        exit();
    }

    try {
        $query = "SELECT * FROM brigadistas WHERE correo = :correo";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['error' => 'No se encontró ningún brigadista con ese correo.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al consultar brigadista.']);
    }
}
?>
