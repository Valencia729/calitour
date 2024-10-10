<html html lang="es">
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<head>
<title>Cali tour 360</title>

<?php
$nombre = $_POST['nombre'];
$host = "localhost";
$port = 5432;
$dbname = "sig360";
$user = "postgres";
$password = "valencia";
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$wkt = "POINT($longitud $latitud)";

try {

    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT ST_GeomFromText(:wkt, 4326) AS geometria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':wkt', $wkt);
    $stmt->execute();
    $resultado = $stmt->fetch();
    $geometria = $resultado['geometria'];

} catch (PDOException $e) {
    echo "Error al generar geometria {descripcion}: " . $e->getMessage();
}

$conn = null;

?>


</head>
<body topmargin="0">
<div class="centrado">
    <div class=titulo_accesorio>procesando...</div><br><br>
    <?php
        $db = pg_connect("host=$host dbname=$dbname user=$user password=$password");


        $query1 = "
            SELECT MIN(t1.gid) + 1 AS gid
            FROM puntos t1
            WHERE NOT EXISTS (
                SELECT 1
                FROM puntos t2
                WHERE t2.id_sitios = t1.gid + 1
            )
            AND t1.gid < 1000";
        

        $result1 = pg_query($db, $query1);
        

        if (!$result1) {
            echo "Error en la consulta.\n";
            exit;
        }
        
        // Obtener el resultado
        $row = pg_fetch_assoc($result1);
        $numero = $row['gid'];
        
        $db = pg_connect("host=localhost dbname=sig360 user=postgres password=valencia");
        $query = "INSERT INTO puntos VALUES ($numero,$numero,'$nombre','$_POST[latitud]','$_POST[longitud]','$_POST[descrip]','$_POST[tipo]','$_POST[id_barrios]','$_POST[id_comuna]','$_POST[area]','$_POST[categoria]','$geometria','$_POST[direccion]','$_POST[visible]')";
        $result = pg_query($db, $query); 
        pg_close($db);
    ?>
</div>
<?php

if (isset($_COOKIE['longitud'])) {
    $latitud = $_COOKIE['latitud'];
    $longitud = $_COOKIE['longitud'];
   
} else {
    echo "Se presento un error: espere...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";
} 
;?>
<?php
// Asegúrate de que el formulario ha enviado 'id_sitios'
if (!isset($_POST['id_sitios']) || empty($_POST['id_sitios'])) {
    die("Falta el ID del sitio.");
}

$id_sitios = basename($_POST['id_sitios']); 


$uploadDirs = array(
    'foto360' => 'galeria/',
    'mini' => 'imagenes/thubnails/img/'
);

// Asegúrate de que cada directorio exista
foreach ($uploadDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}


function uploadJPGFile($fileInputName, $uploadDir, $newFileName) {
    if (isset($_FILES[$fileInputName])) {
        $file = $_FILES[$fileInputName];

        // Verifica si hubo errores
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo "Error al subir el archivo: " . $file['error'];
            return false;
        }

        // Verifica el tamaño del archivo (opcional)
        if ($file['size'] > 5000000) { // Tamaño máximo de 5MB
            echo "El archivo es demasiado grande.";
            return false;
        }

        // Verifica si el archivo es de tipo JPG
        $fileType = mime_content_type($file['tmp_name']);
        if ($fileType !== 'image/jpeg') {
            echo "El archivo no es un JPG válido.";
            return false;
        }

        // Genera la ruta completa del archivo con el nuevo nombre
        $filePath = $uploadDir . $newFileName . '.jpg';

        // Mueve el archivo a la carpeta de destino
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            echo "Archivo subido exitosamente: " . $filePath;
            return $filePath;
        } else {
            echo "Error al mover el archivo.";
            return false;
        }
    } else {
        echo "No se ha enviado el archivo.";
        return false;
    }
}

$foto360Path = uploadJPGFile('foto360', $uploadDirs['foto360'], 'panorama-' . $numero);
$miniPath = uploadJPGFile('mini', $uploadDirs['mini'], $id_sitios);


header ("Location: comprobacion.php");
?>
</body>
</html>
