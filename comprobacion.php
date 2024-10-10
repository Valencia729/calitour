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
		html { height:100%; }
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
        .header_krpano {
            grid-column: 1;
			grid-row: 1;
			height: 100px;
			background-image: url('imagenes/fondo_header.png');
			background-size: cover;
			font-family: 'Poppins', sans-serif;
			font-size: 30px;
			color:white;
  		}
        .results_title_krpano {
            grid-column: 2;
			grid-row: 1;
			background-color: #0e3ecb;
			font-family: 'Poppins', sans-serif;
			font-size: 0px
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
			font-size: 16x;
			padding: 5px;
			color: white;
			text-align: right;
			
		}
		
	</style>


</head>
<body>
<?php
if (isset($_COOKIE['longitud'])) {
    $latitud = $_COOKIE['latitud'];
    $longitud = $_COOKIE['longitud'];
   
} else {
    echo "Se presento un error: espere...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";
} 

?>

<div class=wrapper_krpano>
    <!-- la capa header define la disposicion de la fila 1 columna 1, donde esta el logo -->
    <div class=header_krpano>
    <!-- inserta el logo y un titulo descriptivo -->
    <a href="categorias.html"><img src='imagenes/logo.png' class=logo alt="Gestor de busqueda para sitios turísticos de Cali"></a>
    <img src='imagenes/logo_texto_2.png' class=categoria alt="SigWeb360">
	<a href="javascript: history.go(-1)">
	<img src="imagenes/back.png" class="categoria_t_2" alt="Atrás" width="30px"></a>
	<div class="buscador">
        <form action=buscar.php method=post>
			<input name=search type="text" class="input_buscador" placeholder="Buscar por nombre"><input name="lat_1" type=hidden value="<?php echo $latitud;?>"><input value="<?php echo $longitud;?>" type=hidden name="long_1"><input class="boton_buscador" value="Ir" type=submit>
		</form>
	</div>
</div>
    <!-- la capa results title define la disposicion de la fila 1 columna 2, donde esta el titulo RESULTADOS -->
    <div class=results_title_krpano><br>ENG | ESP
    <div id="google_translate_element" class="google"></div>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
            }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <br><a href="busqueda2.php?p=<?php echo $latitud;?>,<?php echo $longitud;?>&c=0&b=0&j=0&rd=0&cat=Cat0&a=t" class="enlace">Inicio</a> | <a href="index.php" class="enlace">Geoportal</a> | <a href="contacto.php" class="enlace"><img src=imagenes/agregar.png height=15px> Agregar sitio</a>
    </div>

<div class="map_krpano">
<br><br><br><br><br><div class="centrado"><img src="imagenes/valoracion.png" alt="Gracias por tu colaboración"><h2>Gracias por tu colaboración</h2>
<br>
Pronto un administrador revisará tu post y sí es apto será publicado<br>
<a href="list.php">Regresar a la lista de edición</a> | <a href="admin.php">Agregar otro sitio</a>
</div>
</div>
<div class="footer_krpano">Sistema de información geográfica 360 - Universidad del valle 2024 </u></div>

</div>


</div>

</body>

</html>
