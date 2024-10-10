<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Desplegable en Móvil</title>
    <style>
        

        .menuResp {
            display: none; /* Ocultar menú por defecto */
            position: absolute;
            top: 60px; /* Ajustar según el tamaño del botón */
            right: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            width: 200px;
        }

        .menuResp-toggle {
            display: none; /* Ocultar el botón de menú por defecto */
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background-color: #333;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1000; /* Asegurarse de que esté encima del contenido */
            padding: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .menuResp-toggle div {
            width: 20px;
            height: 3px;
            background-color: white;
            margin: 5px auto;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            .menuResp-toggle {
                display: block;
            }
        }

        /* Mostrar el menú cuando se activa la clase 'active' */
        .menuResp.active {
            display: block;
        }

        .menuResp a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .menuResp a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
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
