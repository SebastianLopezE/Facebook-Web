<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace - Facebook</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        :root {
            --bg-body: #f0f2f5;
            --bg-card: #ffffff;
            --bg-hover: #f0f2f5;
            --bg-icon-active: #e7f3ff;
            --bg-icon-inactive: #e4e6eb;
            --bg-input: #f0f2f5;
            --text-primary: #050505;
            --text-secondary: #65676b;
            --blue-fb: #1877f2;
            --green-fb: #42b72a;
            --divider: #ced0d4;
            --border-radius: 8px;
            --icon-size: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-primary);
        }

        /* Header */
        .navegacion-superior {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 56px;
            background-color: var(--bg-card);
            border-bottom: 1px solid var(--divider);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 0 16px;
            box-sizing: border-box;
        }

        .navegacion-superior-izquierda,
        .navegacion-superior-centro,
        .navegacion-superior-derecha {
            display: flex;
            align-items: center;
        }

        .navegacion-superior-izquierda {
            flex-basis: 360px;
            justify-content: flex-start;
        }

        .logo-fb {
            height: 40px;
            margin-right: 12px;
        }

        .navegacion-superior-derecha {
            flex-basis: 360px;
            justify-content: flex-end;
        }

        .navegacion-superior-centro {
            flex-grow: 1;
            justify-content: center;
            max-width: 700px;
        }

        .barra-busqueda {
            background-color: var(--bg-input);
            border-radius: 20px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }

        .barra-busqueda .material-icons {
            color: var(--text-secondary);
        }

        .barra-busqueda input {
            background: none;
            border: none;
            color: var(--text-primary);
            margin-left: 8px;
            width: 200px;
        }

        .barra-busqueda input::placeholder {
            color: var(--text-secondary);
        }

        .grupo-iconos-nav {
            display: flex;
            gap: 8px;
        }

        .icono-nav {
            background-color: var(--bg-icon-inactive);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: var(--text-primary);
            font-size: 20px;
            position: relative;
        }

        .boton-nav-derecha {
            background-color: var(--bg-icon-active);
            color: var(--blue-fb);
            font-weight: 600;
            padding: 0 12px;
            height: 36px;
            display: flex;
            align-items: center;
            border-radius: 18px;
            cursor: pointer;
            margin-right: 8px;
        }

        .icono-nav.active {
            color: var(--blue-fb);
        }

        .icono-nav span.material-icons {
            color: var(--text-primary);
        }

        .icono-nav.active span.material-icons {
            color: var(--blue-fb);
        }

        .enlace-nav-centro {
            padding: 10px 30px;
            margin: 0 4px;
            height: 48px;
            display: flex;
            align-items: center;
            box-sizing: border-box;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: background-color 0.2s, border-bottom 0.3s ease;
            border-radius: var(--border-radius);
        }

        .enlace-nav-centro a {
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .enlace-nav-centro:hover {
            background-color: var(--bg-hover);
        }

        .enlace-nav-centro.active {
            border-bottom-color: var(--blue-fb);
        }

        .enlace-nav-centro span.material-icons {
            color: var(--text-secondary);
            font-size: 28px;
        }

        .enlace-nav-centro.active:hover {
            background-color: transparent;
        }

        .enlace-nav-centro.active span.material-icons {
            color: var(--blue-fb);
        }

        .miniatura-perfil {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            background-color: var(--bg-icon-inactive);
        }

        /* Layout */
        .contenedor {
            display: flex;
            margin-top: 56px;
            height: calc(100vh - 56px);
        }

        @media (max-width: 1300px) {
            .navegacion-superior-derecha {
                flex-basis: auto;
            }
        }

        @media (max-width: 900px) {
            .navegacion-superior-izquierda {
                flex-basis: auto;
            }
        }

        @media (max-width: 768px) {
            .navegacion-superior-centro {
                display: none;
            }

            .barra-busqueda input {
                display: none;
            }

            .barra-busqueda {
                background-color: var(--bg-icon-inactive);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                padding: 0;
                justify-content: center;
            }

            .logo-fb {
                display: none;
            }

            .boton-nav-derecha {
                display: none;
            }
        }

        /* Sidebar */
        .barra-lateral {
            width: 360px;
            background-color: var(--bg-card);
            padding: 16px;
            overflow-y: auto;
            border-right: 1px solid var(--divider);
        }

        .encabezado-barra-lateral {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .encabezado-barra-lateral h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .icono-configuracion {
            width: 36px;
            height: 36px;
            background-color: var(--bg-hover);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .icono-configuracion .material-icons {
            font-size: 20px;
            color: var(--text-primary);
        }

        .buscar-marketplace {
            display: flex;
            align-items: center;
            background-color: var(--bg-hover);
            border-radius: 50px;
            padding: 10px 16px;
            margin-bottom: 8px;
        }

        .buscar-marketplace input {
            border: none;
            background: none;
            outline: none;
            color: var(--text-primary);
            margin-left: 8px;
            width: 100%;
            font-size: 15px;
        }

        .buscar-marketplace input::placeholder {
            color: var(--text-secondary);
        }

        .buscar-marketplace .material-icons {
            color: var(--text-secondary);
            font-size: 20px;
        }

        .menu-barra-lateral {
            margin-top: 8px;
        }

        .elemento-menu {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 4px;
            text-decoration: none;
            color: var(--text-primary);
        }

        .elemento-menu:hover {
            background-color: var(--bg-hover);
        }

        .elemento-menu.active {
            background-color: var(--bg-hover);
        }

        .icono-elemento-menu {
            width: 36px;
            height: 36px;
            background-color: var(--bg-hover);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .elemento-menu.active .icono-elemento-menu {
            background-color: var(--blue-fb);
        }

        .icono-elemento-menu .material-icons {
            font-size: 20px;
            color: var(--text-primary);
        }

        .elemento-menu.active .icono-elemento-menu .material-icons {
            color: white;
        }

        .texto-elemento-menu {
            font-size: 15px;
            font-weight: 500;
        }

        .seccion-menu {
            margin-top: 20px;
        }

        .titulo-seccion-menu {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 8px;
            padding: 0 8px;
        }

        .ubicacion {
            display: flex;
            align-items: center;
            padding: 8px;
            color: var(--text-secondary);
            font-size: 13px;
            margin-top: 16px;
        }

        .ubicacion .material-icons {
            font-size: 16px;
            margin-right: 4px;
            color: var(--blue-fb);
        }

        /* Main Content */
        .contenido-principal {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .encabezado-contenido {
            margin-bottom: 20px;
        }

        .encabezado-contenido h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .cuadricula-productos {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
        }

        .tarjeta-producto {
            background-color: var(--bg-card);
            border-radius: var(--border-radius);
            overflow: hidden;
            cursor: pointer;
        }

        .imagen-producto {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background-color: var(--bg-hover);
        }

        .info-producto {
            padding: 12px;
        }

        .precio-producto {
            font-size: 17px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .titulo-producto {
            font-size: 15px;
            color: var(--text-primary);
            margin-bottom: 4px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .ubicacion-producto {
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .distancia-producto {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .btn-crear-publicacion {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: var(--blue-fb);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 16px;
            width: 100%;
        }

        .btn-crear-publicacion:hover {
            background-color: #1565d8;
        }

        .btn-crear-publicacion .material-icons {
            font-size: 20px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-card);
        }

        ::-webkit-scrollbar-thumb {
            background: #bcc0c4;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .barra-lateral {
            -ms-overflow-style: none;
            scrollbar-width: 20px;
            scrollbar-color: #bcc0c4 transparent;
        }

        @media (max-width: 1100px) {
            .cuadricula-productos {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }

        @media (max-width: 900px) {
            .barra-lateral {
                width: 300px;
            }
        }

        @media (max-width: 768px) {
            .barra-lateral {
                display: none;
            }

            .cuadricula-productos {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }
    </style>
</head>

<body>
    <div class="navegacion-superior">
        <div class="navegacion-superior-izquierda">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook Logo" class="logo-fb">
            <div class="barra-busqueda">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Buscar en Facebook">
            </div>
        </div>
        <div class="navegacion-superior-centro">
            <div class="enlace-nav-centro">
                <a href="{{ route('inicio') }}"><span class="material-icons">home</span></a>
            </div>
            <div class="enlace-nav-centro">
                <a href="/vistaVideo"><span class="material-icons">ondemand_video</span></a>
            </div>
            <div class="enlace-nav-centro active">
                <span class="material-icons">storefront</span>
            </div>
            <div class="enlace-nav-centro">
                <a href="{{ route('grupos') }}"><span class="material-icons">groups</span></a>
            </div>
            <div class="enlace-nav-centro">
                <span class="material-icons">gamepad</span>
            </div>
        </div>
        <div class="navegacion-superior-derecha">
            <div class="boton-nav-derecha">
                Buscar amigos
            </div>
            <div class="grupo-iconos-nav">
                <div class="icono-nav">
                    <span class="material-icons">apps</span>
                </div>
                <div class="icono-nav">
                    <span class="material-icons">chat</span>
                </div>
                <div class="icono-nav">
                    <span class="material-icons">notifications</span>
                </div>
                <div class="">
                    <img src="" alt="" class="miniatura-perfil">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="contenedor">
        <!-- Sidebar -->
        <div class="barra-lateral">
            <div class="encabezado-barra-lateral">
                <h1>Marketplace</h1>
                <div class="icono-configuracion">
                    <span class="material-icons">settings</span>
                </div>
            </div>

            <div class="buscar-marketplace">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Buscar en Marketplace">
            </div>

            <div class="menu-barra-lateral">
                <a href="#" class="elemento-menu active">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">storefront</span>
                    </div>
                    <span class="texto-elemento-menu">Explorar todo</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">notifications</span>
                    </div>
                    <span class="texto-elemento-menu">Notificaciones</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">inbox</span>
                    </div>
                    <span class="texto-elemento-menu">Bandeja de entrada</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">shield</span>
                    </div>
                    <span class="texto-elemento-menu">Acceso a Marketplace</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">shopping_bag</span>
                    </div>
                    <span class="texto-elemento-menu">Compra</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">sell</span>
                    </div>
                    <span class="texto-elemento-menu">Venta</span>
                </a>
            </div>

            <button class="btn-crear-publicacion">
                <span class="material-icons">add</span>
                Crear publicación
            </button>

            <div class="seccion-menu">
                <div class="titulo-seccion-menu">Ubicación</div>
                <div class="ubicacion">
                    <span class="material-icons">location_on</span>
                    <span>Culiacán · En un radio de 65 km</span>
                </div>
            </div>

            <div class="seccion-menu">
                <div class="titulo-seccion-menu">Categorías</div>
                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">directions_car</span>
                    </div>
                    <span class="texto-elemento-menu">Vehículos</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">home</span>
                    </div>
                    <span class="texto-elemento-menu">Alquiler de propiedades</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">sports_soccer</span>
                    </div>
                    <span class="texto-elemento-menu">Artículos deportivos</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="contenido-principal">
            <div class="encabezado-contenido">
                <h2>Sugerencias de hoy</h2>
            </div>

            <div class="cuadricula-productos">
                <!-- Producto 1 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 2 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 3 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 4 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 5 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 6 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 7 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>

                <!-- Producto 8 -->
                <div class="tarjeta-producto">
                    <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Producto" class="imagen-producto">
                    <div class="info-producto">
                        <div class="precio-producto">$65,000</div>
                        <div class="titulo-producto">nombre del producto</div>
                        <div class="ubicacion-producto">ubicacion </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>