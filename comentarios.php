<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando...</title>
</head>
<body>
    <?php
    include 'conexion.php';
$db = pg_connect("host=localhost dbname=sig360 user=postgres password=valencia");
    $query = "INSERT INTO comentarios VALUES ('$_POST[id]','$_POST[id_sitio]','$_POST[valoracion]','$_POST[autor]','$_POST[fecha]','$_POST[texto]')";
    $result = pg_query($query); 
    $id_sitio = $_POST['id_sitio'];
    if (isset($id_sitio)) {
        header("Location: gracias.php?id=" . urlencode($id_sitio));
        exit(); 
    } else {

        echo "ID de sitio no definido.";
    }
?>

;?>
</body>
</html>
