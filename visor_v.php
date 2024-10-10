<!DOCTYPE html>
<html>
    
<head>
    
	<title>Cali Tour 360</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="pannellum.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="leaflet.js"></script>
        <style>
        #panorama { 
            width: auto;
            height: calc(100vh - 130px);
        }
        @media (max-width: 500px) {
            #panorama{
                height: calc(100vh - 0px);
            }
        }
        
        /* Estilos para la ventana modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            padding-top: 60px;

        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 500px;
            border-radius: 20px;
            opacity: 90%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        /* Estilos para el mapa */
        #map {
            width: 250px;
            height: 200px;
            position: absolute;
            top: 200px;
            left: 5px;
            z-index: 2;
            border-radius: 20px;
            border: 2px white solid;
        }
        @media (max-width: 500px) {
            #map{
                display: none;
            }
        }

		html { height:100%;}
		body { height:100%; overflow:hidden; margin:0; padding:0;}
        .wrapper_krpano {
			display: grid;
  			grid-template-columns:70% 30%;
			grid-template-rows:0.1fr auto 0.1fr;
			height: 100%;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
		}
        .header_krpano1 {
            grid-column: 1;
			grid-row: 1;
			height: 100px;
			background-image: url('imagenes/fondo_header_1.png');
			background-size: cover;
			font-family: 'Poppins', sans-serif;
			font-size: 30px;
			color:white;
  		}
        .results_title_krpano1 {
            grid-column: 2;
			grid-row: 1;
			background-color: #400051;
			font-family: 'Poppins', sans-serif;
			font-size: 14px;
			padding-top: 10px;
			color: white;
			text-align:center;
			z-index:2;
  		}
      .header_krpano2 {
            grid-column: 1;
			grid-row: 1;
			height: 100px;
			background-image: url('imagenes/fondo_header_2.png');
			background-size: cover;
			font-family: 'Poppins', sans-serif;
			font-size: 30px;
			color:white;
  		}
        .results_title_krpano2 {
            grid-column: 2;
			grid-row: 1;
			background-color: #0035d6;
			font-family: 'Poppins', sans-serif;
			font-size: 14px;
			padding-top: 10px;
			color: white;
			text-align:center;
			z-index:2;
  		}
          .header_krpano3 {
            grid-column: 1;
			grid-row: 1;
			height: 100px;
			background-image: url('imagenes/fondo_header_3.png');
			background-size: cover;
			font-family: 'Poppins', sans-serif;
			font-size: 30px;
			color:white;
  		}
        .results_title_krpano3 {
            grid-column: 2;
			grid-row: 1;
			background-color: #00590e;
			font-family: 'Poppins', sans-serif;
			font-size: 14px;
			padding-top: 10px;
			color: white;
			text-align:center;
			z-index:2;
  		}
          @media (max-width: 500px) {
            .results_title_krpano1{
                display: none;
            }}	
	 @media (max-width: 500px) {
            .results_title_krpano2{
                display: none;
            }}
	 @media (max-width: 500px) {
            .results_title_krpano3{
                display: none;
            }}
	@media (max-width: 500px) {
            .header_krpano1{
                grid-column: 1/3;
            }}
	@media (max-width: 500px) {
            .header_krpano2{
                grid-column: 1/3;
            }}
	@media (max-width: 500px) {
            .header_krpano3{
                grid-column: 1/3;
            }}
        .map_krpano {
  			grid-column: 1/3;
			grid-row: 2;
            height: 100%;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
  		}
          @media (max-width: 500px) {
            .map_krpano{
                grid-column: 1/3;
                grid-row: 2/3;
                height: 100%;
                width: 100%;
                max-width: 100%;
                max-height: 100%;
            
            
        }}
        .footer_krpano{
			grid-column: 1/3;
			grid-row: 3;
			background-color: #017F79;
			font-family: 'Poppins', sans-serif;
			font-size: 16px;
			padding: 5px;
			color: white;
			text-align: right;
            display: flex;
            align-items: center;
			
		}
        @media (max-width: 500px) {
            .footer_krpano{
                display: none;
            }
            
            
        }
		.footer_krpano img{
            vertical-align: middle;

        }
        
	</style>
    <?php
        include 'conexion.php';

$latitud = "";
$longitud ="";
if (isset($_GET['view']) && $_GET['view'] === 'uv') {
   	$latitud = "3.374384";
	$longitud = "-76.534015";
} else {

    if (isset($_COOKIE['longitud'])) {
        $latitud = $_COOKIE['latitud'];
        $longitud = $_COOKIE['longitud'];
	
       
    } else {
        echo "Sucedio un error al procesar la ubicación, Espere por favor...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";

    }    
    }
    ?>

</head>
<body  onselectstart="return false" ondragstart="return false">
<?php
    $id = $_GET['id'];
        include 'conexion.php';
        $query="SELECT * FROM puntos WHERE id_sitios = $id limit 1";
        $consulta=pg_query($conexion,$query);
        while($obj=pg_fetch_object($consulta)){
            $categoria_text = $obj->categoria;

            }
    ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v20.0" nonce="3EZZzeYE"></script>
  <div class=wrapper_krpano>
    <!-- la capa header define la disposicion de la fila 1 columna 1, donde esta el logo -->
    <div class="header_krpano<?php echo $categoria_text;?>">
    <!-- inserta el logo y un titulo descriptivo -->
    <a href="busqueda2.php?p=<?php echo $latitud;?>,<?php echo $longitud;?>&c=0&b=0&j=0&rd=0&cat=Cat0&a=t"><img src='imagenes/logo.png' class=logo alt="Gestor de busqueda para sitios turísticos de Cali"></a>
    
    <img src='imagenes/cat<?php echo $categoria_text;?>.png' class=categoria_v alt="Gestor de busqueda para sitios turísticos de Cali">
	<a href="javascript: history.go(-1)">
	<img src="imagenes/back.png" class="categoria_t" alt="Atrás" width="30px"></a>
	<div class="buscador">
        <form action=buscar.php method=post>
			<input name=search type="text" class="input_buscador" placeholder="Buscar por nombre"><input name="lat_1" type=hidden value="<?php echo $latitud;?>"><input value="<?php echo $longitud;?>" type=hidden name="long_1"><input class="boton_buscador" value="Ir" type=submit>
		</form>
	</div>
</div>
    <!-- la capa results title define la disposicion de la fila 1 columna 2, donde esta el titulo RESULTADOS -->
    <div class="results_title_krpano<?php echo $categoria_text;?>">ENG | ESP
    <div id="google_translate_element" class="google"></div>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
            }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <br><a href="busqueda2.php?p=<?php echo $latitud;?>,<?php echo $longitud;?>&c=0&b=0&j=0&rd=0&cat=Cat0&a=t" class="enlace">Inicio </a> | <a href="http://www.calitour360.com" class="enlace"> Geoportal </a> | <a href="login.php?verify" class="enlace"><img src=imagenes/agregar.png height=15px> Agregar sitio</a>
    </div>

<div class="map_krpano">
<div id="panorama"></div>


<!-- Mapa de Leaflet -->
<div id="map"></div>
<?php
        $query = "SELECT * FROM puntos where id_sitios = $id LIMIT 1";
        $consulta = pg_query($conexion, $query);

        while ($obj = pg_fetch_object($consulta)) {
            $lat_p = $obj->latitud;
            $long_p = $obj->longitud;
            $nombre_p = $obj->nombre;
            $descripcion = "$obj->descrip";
        }
        ?>


<script>

var map = L.map('map').setView([<?php echo $lat_p;?>, <?php echo $long_p;?>], 19);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);



var markers = [
    <?php
        $query = "SELECT * FROM puntos LIMIT 88";
        $consulta = pg_query($conexion, $query);

        while ($obj = pg_fetch_object($consulta)) {
            echo "{ coords: [" . $obj->latitud . ", " . $obj->longitud . "], link: ". $obj->id_sitios .", panorama: '". $obj->nombre."'},";
            
        }
        ?>

];
var customIcon = L.icon({
    iconUrl: 'imagenes/parada.png',  
    iconSize: [20, 32],  
    iconAnchor: [10, 30],  
    popupAnchor: [0, -32]  
});

markers.forEach(function(marker) {

    var customIcon = L.divIcon({
        className: 'custom-icon', 
        html: '<div class="icon-content">' + marker.panorama + '<br><img src=imagenes/ubicacion.png height=25px></div>', 
        iconSize: [20, 32], 
        iconAnchor: [50, 30], 
        popupAnchor: [0, -32] 
    });

    // Añadir el marcador al mapa con el icono personalizado
    var markerObj = L.marker(marker.coords, { icon: customIcon }).addTo(map).on('click', function(e) {
        var popupContent = 'Ir a: <a href=clasifier.php?id=' + marker.link + '&lat=' + <?php echo $latitud;?> + '&long='+<?php echo $longitud;?> +' "> '+ marker.panorama +' </a>';

        var popup = L.popup()
            .setLatLng(marker.coords)
            .setContent(popupContent)
            .openOn(map);
        
        e.stopPropagation(); 
    });
});
const marker = L.marker([<?php echo $lat_p;?>,<?php echo $long_p;?>]).addTo(map)
		.bindPopup('Viendo:<b><?php echo $nombre_p;?></b>').openPopup();


</script>

<iframe src="galeria/assets/videos360/<?php echo $id;?>/" class="iframe" width="100%"></iframe>
</div>
<div class="footer_krpano">
<div class="fb-like" data-href="https://www.facebook.com/profile.php?id=61563564985861" data-width="100" data-layout="" data-action="" data-size="" data-share="true"></div>

<div style="position:absolute; right:0px;">
<a href="https://www.facebook.com/sharer/sharer.php?u=http://www.calitour360.com/" title="Comparte en Facebook"><img src="imagenes/facebook.png" height="20px"></a> 
    <a href="https://api.whatsapp.com/send?text=Hola, te invito a conocer <?php echo $nombre_p;?> con Cali tour 360 - Sistema de Información Geográfico turístico de Cali 360. http://www.calitour360.xyz/visor_f.php?id=<?php echo $id;?>&view=uv"  title="Comparte en whatsapp"><img src="imagenes/whatsapp.png" height="20px"></a> 
    <a href="https://www.instagram.com/sigweb360"> <img src="imagenes/instagram.png" height="20px" title="Vísitanos en instagram"></a>      
    Sistema de Información Geográfica 360 - Universidad del Valle 2024</div>

</div>


<?php 
$query="SELECT * FROM puntos where id_sitios = $id limit 1";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
	$id = $obj->id_sitios;
    $latitud_f = $obj->latitud;
    $longitud_f = $obj->longitud;
}
?>
<div class=leyenda_filtro_v><img src=imagenes/sonidos.png height=15px> Foto 360 | <a href="routing.php?id=<?php echo $id;?>&lat_i=<?php echo $latitud;?>&long_i=<?php echo $longitud;?>&lat_f=<?php echo $latitud_f;?>&long_f=<?php echo $longitud_f;?>">¿Cómo llegar?</a></div>
<div class=leyenda_filtro_box><div class="centrado"><img src="imagenes/ubicacion.png" class="logo_descripcion"><br><span class="title_sitio"><?php echo $nombre_p;?></span><br><br>
<button class="controles_e_comentarios" onclick="window.modal3.showModal();">
    <img src="imagenes/thubnails/img/<?php echo $id;?>.jpg"  width="120px" height="80px" alt="Visor 360" onerror="this.onerror=null; this.src='imagenes/portal1.jpg';">
</button>
<dialog id="modal3" class="modal_visor">
<div class="slider">
    <div class="slides">
	<div class="slide"><img src="imagenes/thubnails/img/<?php echo $id;?>.jpg" alt="visor 360" onerror="this.onerror=null; this.src='imagenes/portal1.jpg';"></div>
        <div class="slide"><img src="imagenes/portal1.jpg" alt="visor 360"></div>
        <div class="slide"><img src="imagenes/portal2.jpg" alt="visor 360"></div>
        <div class="slide"><img src="imagenes/portal3.jpg" alt="visor 360"></div>
    </div>
    <a class="prev">&#10094;</a>
    <a class="next">&#10095;</a>
    <div class="centrado"><button onclick="window.modal3.close();">Cerrar</button></div>
</div>

<script>
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;
    let slideIndex = 0;

    function showSlide(index) {
        if (index >= totalSlides) {
            slideIndex = 0;
        } else if (index < 0) {
            slideIndex = totalSlides - 1;
        } else {
            slideIndex = index;
        }
        slides.style.transform = `translateX(${-slideIndex * 100}%)`;
    }

    prev.addEventListener('click', () => showSlide(slideIndex - 1));
    next.addEventListener('click', () => showSlide(slideIndex + 1));

    // Show the first slide
    showSlide(slideIndex);
</script>
            </dialog>
</div><br><span class="text_descripcion"><?php echo $descripcion;?></span><br>
<hr>

    <?php 
        $query="SELECT count(id) as contador FROM comentarios where id_sitio = $id";
        $consulta=pg_query($conexion,$query);
        while($obj=pg_fetch_object($consulta)){
            $contador = $obj->contador;
            if($obj->contador == 0){
                echo "<span class='texto_comentario'><img src=imagenes/comentario.png height=12px> Sé el primero en comentar</span><br>";

            }   
        }
        $query="SELECT * FROM comentarios where id_sitio = $id order by id desc limit 1";
        $consulta=pg_query($conexion,$query);
        while($obj=pg_fetch_object($consulta)){
            $texto_1 = substr($obj->texto, 0, 40);
            echo "<img src=imagenes/comentario.png style=\"vertical-align:top; height:15px;\"><span class='autor_comentario'>".$obj->autor."</span><img src='imagenes/estrella".$obj->valoracion.".png' class='valoracion_comentario' alt='Valoración'><br><span class='texto_comentario'>".$texto_1."...</span><br>
            ";}
            ;?>
            <br><div class="centrado"><button class="controles_e_comentarios" onclick="window.modal1.showModal();">Mas comentarios</button>
            <dialog id="modal1" class="modal_visor">
            <br>
            <?php
                $query="SELECT * FROM comentarios where id_sitio = $id order by id asc";
                $consulta=pg_query($conexion,$query);
                while($obj=pg_fetch_object($consulta)){
                    $texto_1 = $obj->texto;
                    $id_contador = $obj->id;
                    echo "<img src=imagenes/comentario.png height=15px><span class='autor_comentario'>".$obj->autor."</span><img src='imagenes/estrella".$obj->valoracion.".png' class='valoracion_comentario' alt='Valoración'><br><span class='texto_comentario'>".$texto_1.".<br>".$obj->fecha."</span><hr><br>
                    ";}
            ?>
            <?php 
            $query="SELECT count(id) as contador FROM comentarios where id_sitio = $id";
            $consulta=pg_query($conexion,$query);
            while($obj=pg_fetch_object($consulta)){
                $contador = $obj->contador;
                if($obj->contador == 0){
                    echo "<span class='texto_comentario'><img src=imagenes/comentario.png height=12px> Sé el primero en comentar</span> <button onclick=\"window.modal2.showModal();\">Comentar</button><br>";

                }   
            }
            ;?>
	<?php
		$query="SELECT count(id) as contadorx FROM comentarios";
            $consulta=pg_query($conexion,$query);
            while($obj=pg_fetch_object($consulta)){
                $contador_id = $obj->contadorx + 1;

		}
            ;?>
            <div class="centrado"><br><button onclick="window.modal1.close();">Cerrar</button></div>
            </dialog>
            <button class="controles_e_comentarios" onclick="window.modal2.showModal();">Comentar</button>
            <dialog id="modal2" class="modal_visor">
            <span class="titulo_general">Aporta tu comentario</span><br><br>
            <form action="comentarios.php" method="post">
                Su nombre:<br> <input type="text" name="autor" required>
                <br><br>Valoración:<br> <label><input type="radio" value="1" name="valoracion"><img src="imagenes/estrella1.png" height="15px" alt="1 Estrella">1 Estrella</label><br>
                <label><input type="radio" value="1" name="valoracion"><img src="imagenes/estrella2.png" height="15px" alt="2 Estrella">2 Estrellas</label><br>
                <label><input type="radio" value="3" name="valoracion"><img src="imagenes/estrella3.png" height="15px" alt="3 Estrella">3 Estrellas</label><br>
                <label><input type="radio" value="4" name="valoracion"><img src="imagenes/estrella4.png" height="15px" alt="4 Estrella">4 Estrellas</label><br>
                <label><input type="radio" value="5" name="valoracion"><img src="imagenes/estrella5.png" height="15px" alt="5 Estrella">5 Estrellas</label><br>
                <br>Comentario: <br><textarea rows="5" cols="65" name="texto" required></textarea>
                <input type="hidden" name="fecha" value="<?php echo date('d-m-Y');?>">
                <input type="hidden" name="id_sitio" value="<?php echo $id;?>">
                <input type="hidden" name="id" value="<?php echo $id_contador;?>">
                <br><input class="enlace_e_visor" type="submit" value="Enviar"> <button onclick="window.modal2.close();">Cerrar</button>

            </form>
            &nbsp;
            </dialog>
        <?php    
        $query="SELECT ROUND(AVG(valoracion), 1) AS promedio_valor from comentarios where id_sitio = $id";
        $consulta=pg_query($conexion,$query);
        while($obj=pg_fetch_object($consulta)){
            if($contador == 0){
                echo "";
                $img_v = "";
            }else{
                $img_v = "<img src='imagenes/valoracion.png' class='img_valoracion'>";
            }
            echo "<br><br><div class='centrado'><span class='promedio_comentarios'>".$img_v.$obj->promedio_valor."</span></div>";
        }
        
    ;?>
</div>
<dialog id="modal4" class="modal_visor">
<div class="centrado">
<iframe src="all.php?lat=<?php echo $latitud_f;?>&long=<?php echo $longitud_f;?>&idx=<?php echo $id;?>" width="100%" style="height:350px;" frameborder="0" scrollbars="no"></iframe>
<button onclick="window.modal4.close();">Cerrar</button>
</div>
</dialog>

<button class="menuResp-toggle" id="menuRespToggle">
        <div></div>
        <div></div>
        <div></div>
    </button>
    <div class="menuResp" id="menuResp">
        <a href="https://www.calitour360.com/" title="Geoportal">Geoportal</a>
        <a href="categorias.html" title="Categorias">Categorias</a>
        <a href="https://calitour360.com/cop"  title="COP16 en Univalle">COP16 Univalle</a>
    </div>

    <script>
        document.getElementById('menuRespToggle').addEventListener('click', function() {
            var menuResp = document.getElementById('menuResp');
            if (menuResp.classList.contains('active')) {
                menuResp.classList.remove('active');
            } else {
                menuResp.classList.add('active');
            }
        });
    </script>
</body>
</html>