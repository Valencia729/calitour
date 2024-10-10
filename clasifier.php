<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espere...</title>
</head>
<body>
    <?php
    include 'conexion.php';
    if (isset($_COOKIE['longitud'])) {
        $latitud = $_COOKIE['latitud'];
        $longitud = $_COOKIE['longitud'];
       
    } else {
        echo "Se presento un error: espere...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";
    } 

    $id = $_GET['id'];
    $query="SELECT * FROM puntos where id_sitios = $id limit 1";
    $consulta=pg_query($conexion,$query);
    while($obj=pg_fetch_object($consulta)){
            $id = $obj->id_sitios;
            $tipo = $obj->tipo;
        }
    
    if($tipo == "1"){
        header ("Location: visor_f.php?id=".$id."&lat=".$latitud."&long=".$longitud);

    }
    if($tipo == "2"){
        header("Location: visor_v.php?id=".$id."&lat=".$latitud."&long=".$longitud);
    }
    if($tipo == "3"){
        header("Location: visor_fv.php?id=".$id."&lat=".$latitud."&long=".$longitud);
    }

    ?>
</body>
</html>