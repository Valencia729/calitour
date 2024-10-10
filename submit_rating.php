<?php
// Configuración de la base de datos
$host = 'localhost';
$db = 'sig360';
$user = 'postgres';
$pass = 'valencia';
$port = '5432';

// Crear una conexión a la base de datos
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass port=$port");

if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'No se pudo conectar a la base de datos.']);
    exit;
}

// Obtener la entrada JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['rating'])) {
    $rating = (int)$data['rating'];

    // Validar calificación
    if ($rating >= 1 && $rating <= 5) {
        $result = pg_query_params($conn, 'INSERT INTO ratings (rating) VALUES ($1)', [$rating]);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error al insertar en la base de datos.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Calificación no válida.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Calificación no proporcionada.']);
}

// Cerrar la conexión
pg_close($conn);
?>