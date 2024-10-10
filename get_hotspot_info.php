<?php
include 'conexion.php'; 

if (isset($_GET['id'])) {
    $hotspotId = intval($_GET['id']);
    $query = "SELECT * FROM hotspot WHERE id = $hotspotId LIMIT 1";
    $consulta = pg_query($conexion, $query);
    $obj = pg_fetch_object($consulta);
    if ($obj) {

        echo "<div class='centrado'>";
        echo "<p class='titulo_cop'>" . htmlspecialchars($obj->text) . "</p>";
	echo "<p>" . htmlspecialchars($obj->text) . htmlspecialchars($obj->type) . "</p>";
        echo "</div>";
        echo "<img src='galeria/assets/cop/imagenes/" . htmlspecialchars($obj->id) . ".jpg' height=250px width=350px alt='" . htmlspecialchars($obj->text) . "'>";
        echo "<p>" . htmlspecialchars($obj->link) . " <img src=imagenes/ornitologia.png height=20px alt='Lab Ornitologia Univalle OYCA'></p>";
	
        echo "</div>";
	echo "<div class=\"centrado\"><audio src=\"galeria/assets/cop/audios/" . htmlspecialchars($obj->id) . ".mp3\" controls autoplay loop></audio>";
	
    echo "<br>Compartir<br> <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://www.calitour360.com/\" title=\"Comparte en Facebook\"><img src=\"imagenes/facebook.png\" height=\"20px\"></a> <a href=\"https://api.whatsapp.com/send?text=Cali tour 360 - Sistema de información geográfico turístico de Cali 360. http://www.calitour360.com/\"  title=\"Comparte en whatsapp\"><img src=\"imagenes/whatsapp.png\" height=\"20px\"></a>";

	echo "</div>";
    } else {
        echo "<p>No se encontró la información del hotspot.</p>";
    }
} else {
    echo "<p>ID de hotspot no proporcionado.</p>";
}
?>
