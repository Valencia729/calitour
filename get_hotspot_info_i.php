<?php
include 'conexion.php'; 

if (isset($_GET['id'])) {
    $hotspotId = intval($_GET['id']);
    $query = "SELECT * FROM hotspot WHERE id = $hotspotId LIMIT 1";
    $consulta = pg_query($conexion, $query);
    $obj = pg_fetch_object($consulta);
    if ($obj) {

        echo "<div class='centrado'>";
        echo "<p class='titulo_card'>" . htmlspecialchars($obj->text) . "</p>";

        echo "</div>";
        
        echo "<div class='centrado'>";
        echo "<img src=imagenes/thubnails/img/".$obj->type."-".$obj->id_origen.".jpg width=350px height=250px>";
        echo "</div>";

        echo "<div class='centrado'>";
        echo "<p>" . htmlspecialchars($obj->link) . "</p>";
        echo "</div>";

        echo "<div class=\"centrado\">";
        echo "<br>Compartir<br> 
            <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://www.calitour360.com/\" title=\"Comparte en Facebook\">
                <img src=\"imagenes/facebook.png\" height=\"20px\">
            </a> 
            <a href=\"https://api.whatsapp.com/send?text=Cali tour 360 - Sistema de información geográfico turístico de Cali 360. http://www.calitour360.com/\"  title=\"Comparte en whatsapp\">
                <img src=\"imagenes/whatsapp.png\" height=\"20px\">
            </a>";
        echo "</div>";
    } else {
        echo "<p>No se encontró la información del hotspot.</p>";
    }
} else {
    echo "<p>ID de hotspot no proporcionado.</p>";
}
?>
