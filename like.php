<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'sig360';
$user = 'postgres';
$password = 'valencia';
$dsn = "pgsql:host=$host;dbname=$dbname";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];


    // Incrementar el contador de "Me gusta" para el ID dado
    $pdo->prepare("UPDATE likes SET likes_count = likes_count + 1 WHERE page_id = :id")
        ->execute(['id' => $id]);

    // Obtener el nuevo valor del contador
    $query = $pdo->prepare("SELECT likes_count FROM likes WHERE page_id = :id");
    $query->execute(['id' => $id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);

    echo $row['likes_count'];
}
?>