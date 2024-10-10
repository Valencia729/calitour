<?php
// Parámetros de conexión
$host = "localhost";
$dbname = "proyecto_sig2";
$user = "postgres";
$password = "valencia";

// Cadena de conexión
$connection_string = "host=$host dbname=$dbname user=$user password=$password";

// Intentar la conexión
$conexion = pg_connect($connection_string);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    echo "Error: No se pudo conectar a la base de datos.\n";
    exit;
}

?>