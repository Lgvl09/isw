
<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seccion = $_POST['seccion'] ?? '';

    if (empty($seccion)) {
        echo json_encode(['error' => 'Por favor, selecciona una sección.']);
        exit();
    }

    try {
        $query = "SELECT * FROM brigadistas WHERE seccion = :seccion";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':seccion', $seccion);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            echo json_encode($results);
        } else {
            echo json_encode(['error' => 'No hay brigadistas en esta sección.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error al consultar brigada.']);
    }
}
?>
