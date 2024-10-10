<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quick Start - Leaflet</title>
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body bottommargin="0px" topmargin="0px">
<?php
    include 'conexion.php';

    // Captura la variable p que es la lat/long de la barra de direcciones
    if (isset($_COOKIE['longitud'])) {
        $latitud = $_COOKIE['latitud'];
        $longitud = $_COOKIE['longitud'];
    } else {
        echo "Se presentó un error: espere...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";
    }    
    $lat_actual = $_GET['lat'];
    $long_actual = $_GET['long'];
    $id_sitios_ex = $_GET['idx'];
?>

<div id="map" style="width: 100%; height: 350px;"></div>
<script>
    var iconoBase = L.Icon.extend({
        options: {
            iconSize: [30, 40],
            iconAnchor: [15, 40]
        }
    });

    var marcador = new iconoBase({ iconUrl: 'imagenes/ubicacion.gif' }),
        estacion = new iconoBase({ iconUrl: 'imagenes/estacion.png' }),
        sitio = new iconoBase({ iconUrl: 'imagenes/ubicacion.png' });

	const map = L.map('map').setView([<?php echo $lat_actual;?>, <?php echo $long_actual;?>], 17);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 29,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    const marcador1 = L.marker([<?php echo $lat_actual;?>, <?php echo $long_actual;?>], {icon: sitio}).addTo(map).bindPopup('<b>Estoy aquí</b>');

    <?php
        $query = "SELECT * FROM puntos WHERE id_sitios != $id_sitios_ex LIMIT 88";
        $consulta = pg_query($conexion, $query);

        while ($obj = pg_fetch_object($consulta)) {
            echo "const marker".$obj->id_sitios." = L.marker([".$obj->latitud.", ".$obj->longitud."], {
                icon: L.divIcon({
                    html: '<div style=\"position: relative; text-align: center;\"><a href=clasifier.php?id=".$obj->id_sitios." target=_top title=Visitar><img src=\"imagenes/ubicacion.gif\" style=\"width: 30px; height: 40px;\"></a><div style=\"background-color: white; border: 1px solid black; padding: 2px; border-radius: 5px; position: absolute; top: -25px; left: -20%; transform: translateX(-50%); width: max-content; white-space: nowrap;\"><a href=clasifier.php?id=".$obj->id_sitios." target=_top title=Visitar>".$obj->nombre."</a></div></div>',
                    iconSize: [30, 40],
                    iconAnchor: [15, 40],
                    className: ''
                })
            }).addTo(map);";
        }
    ?>
</script>
</body>
</html>
