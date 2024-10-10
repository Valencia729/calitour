<!DOCTYPE html>
<html>
    
<head>
    
	<title>Cali Tour 360</title>
    <meta property="og:url"           content="https://www.calitour360.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Cali tour 360" />
    <meta property="og:description"   content="Sistema de información geográfico 360 turistico de cali, colombia" />
    <meta property="og:image"         content="https://www.calitour360.com/imagenes/logo.png" />
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
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <style>
        #panorama { 
            width: auto;
            height: 520px;
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
        .map_krpano {
  			grid-column: 1/3;
			grid-row: 2;
            height: 100%;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
  		}
        .footer_krpano{
			grid-column: 1/3;
			grid-row: 3;
			background-color: #017F79;
			font-family: 'Poppins', sans-serif;
			font-size: 16px;
			padding: 5px;
			color: white;
			text-align: right;
			
		}
		
	</style>
 

</head>
<body>
<?php
    $id = $_GET['id'];
        include 'conexion.php';
        $query="SELECT * FROM puntos WHERE id_sitios = $id limit 1";
        $consulta=pg_query($conexion,$query);
        while($obj=pg_fetch_object($consulta)){
            $categoria_text = $obj->categoria;
            }
    ?>
<div class=wrapper_krpano>
    <!-- la capa header define la disposicion de la fila 1 columna 1, donde esta el logo -->
    <div class="header_krpano<?php echo $categoria_text;?>">
    <!-- inserta el logo y un titulo descriptivo -->
    <a href="consulta.html"><img src='imagenes/logo.png' class=logo alt="Gestor de busqueda para sitios turísticos de Cali"></a>
    
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
    <div class="results_title_krpano<?php echo $categoria_text;?>"><br>ENG | ESP
    <div id="google_translate_element" class="google"></div>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
            }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <br><a href="busqueda2.php?p=<?php echo $latitud;?>,<?php echo $longitud;?>&c=0&b=0&j=0&rd=0&cat=Cat0&a=t" class="enlace">Inicio </a> | <a href="index.php" class="enlace"> Geoportal </a> | <a href="login.php?verify" class="enlace"><img src=imagenes/agregar.png height=15px> Agregar sitio</a>
    </div>

<div class="map_krpano">
<div class="centrado">
	<br><br><br>
	<img src="imagenes/agregar.png" height="20px" alt="Agregar sitio"><br><a href="new.php">Agregar</a>

</div>

</div>
<div class="footer_krpano">
<a href="https://www.facebook.com/sharer/sharer.php?u=http://www.calitour360.com/" title="Comparte en Facebook"><img src="imagenes/facebook.png" height="20px"></a>
    <a href="https://api.whatsapp.com/send?text=Cali tour 360 - Sistema de información geográfico turístico de Cali 360. http://www.calitour360.com/"  title="Comparte en whatsapp"><img src="imagenes/whatsapp.png" height="20px"></a>
    <a href="https://www.instagram.com/sigweb360"><img src="imagenes/instagram.png" height="20px" title="Vísitanos en instagram"></a>     
Sistema de información geográfica 360 - Universidad del valle 2024 </u></div>

</div>



</body>

</html>
