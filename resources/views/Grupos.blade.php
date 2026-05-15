<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos - Facebook</title>
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
            background-color: var(--bg-hover);
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
            background-color: var(--bg-hover);
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
            background-color: var(--bg-hover);
            color: var(--text-primary);
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
            background-color: var(--bg-hover);
        }

        /* Layout */
        .contenedor {
            display: flex;
            margin-top: 56px;
            height: calc(100vh - 56px);
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

        .buscar-grupos {
            display: flex;
            align-items: center;
            background-color: var(--bg-hover);
            border-radius: 50px;
            padding: 10px 16px;
            margin-bottom: 16px;
        }

        .buscar-grupos input {
            border: none;
            background: none;
            outline: none;
            color: var(--text-primary);
            margin-left: 8px;
            width: 100%;
            font-size: 15px;
        }

        .buscar-grupos input::placeholder {
            color: var(--text-secondary);
        }

        .buscar-grupos .material-icons {
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-secondary);
        }

        .titulo-seccion-menu a {
            color: var(--blue-fb);
            text-decoration: none;
            font-size: 15px;
            font-weight: 400;
        }

        .btn-crear-grupo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: var(--bg-hover);
            color: var(--text-primary);
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 16px;
            width: 100%;
        }

        .btn-crear-grupo:hover {
            background-color: var(--bg-hover);
            opacity: 0.8;
        }

        .btn-crear-grupo .material-icons {
            font-size: 20px;
        }

        .elemento-grupo {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 4px;
        }

        .elemento-grupo:hover {
            background-color: var(--bg-hover);
        }

        .miniatura-grupo {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            margin-right: 12px;
            background-color: var(--bg-hover);
            object-fit: cover;
        }

        .info-grupo {
            flex: 1;
        }

        .nombre-grupo {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .actividad-grupo {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .icono-fijar {
            color: var(--text-secondary);
            font-size: 20px;
        }

        /* Main Content */
        .contenido-principal {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .encabezado-contenido {
            margin-bottom: 20px;
            width: 100%;
            max-width: 680px;
        }

        .encabezado-contenido h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .tarjeta-publicacion {
            background-color: var(--bg-card);
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 680px;
        }

        .encabezado-publicacion {
            display: flex;
            align-items: flex-start;
            padding: 12px 16px;
        }

        .encabezado-publicacion-izquierda {
            display: flex;
            flex: 1;
        }

        .avatar-grupo {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            margin-right: 12px;
            background-color: var(--bg-hover);
            object-fit: cover;
        }

        .info-publicacion {
            flex: 1;
        }

        .titulo-grupo {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .metadatos-publicacion {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: var(--text-secondary);
        }

        .opciones-publicacion {
            color: var(--text-secondary);
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
        }

        .opciones-publicacion:hover {
            background-color: var(--bg-hover);
        }

        .contenido-publicacion {
            padding: 0;
        }

        .descripcion-publicacion {
            font-size: 15px;
            line-height: 1.5;
            margin-bottom: 12px;
            color: var(--text-primary);
            padding: 4px 16px 0 16px;
        }

        .contenedor-imagen-publicacion {
            width: 100%;
            background-color: #898383ff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imagen-publicacion {
            max-width: 100%;
            max-height: 600px;
            display: block;
            object-fit: contain;
        }

        .texto-publicacion {
            font-size: 24px;
            line-height: 1.4;
            text-align: center;
            padding: 40px 20px;
        }

        .acciones-publicacion {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid var(--divider);
            padding: 4px 8px;
        }

        .accion-publicacion {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 15px;
            flex: 1;
        }

        .accion-publicacion:hover {
            background-color: var(--bg-hover);
        }

        .accion-publicacion .material-icons {
            font-size: 20px;
        }

        .estadisticas-publicacion {
            display: flex;
            justify-content: space-between;
            padding: 8px 16px;
            font-size: 15px;
            color: var(--text-secondary);
            border-top: 1px solid var(--divider);
        }

        .me-gusta {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .icono-me-gusta {
            width: 18px;
            height: 18px;
            background-color: var(--blue-fb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .enlace-comentarios {
            cursor: pointer;
        }

        .enlace-comentarios:hover {
            text-decoration: underline;
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

        @media (max-width: 1300px) {
            .navegacion-superior-derecha {
                flex-basis: auto;
            }
        }

        @media (max-width: 900px) {
            .navegacion-superior-izquierda {
                flex-basis: auto;
            }

            .barra-lateral {
                width: 300px;
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
                background-color: var(--bg-hover);
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

            .barra-lateral {
                display: none;
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
            <div class="enlace-nav-centro">
                <a href="{{ route('marketplace') }}"><span class="material-icons">storefront</span></a>
            </div>
            <div class="enlace-nav-centro active">
                <span class="material-icons">groups</span>
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
                <h1>Grupos</h1>
                <div class="icono-configuracion">
                    <span class="material-icons">settings</span>
                </div>
            </div>

            <div class="buscar-grupos">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Buscar grupos">
            </div>

            <div class="menu-barra-lateral">
                <a href="#" class="elemento-menu active">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">groups</span>
                    </div>
                    <span class="texto-elemento-menu">Tu feed</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">explore</span>
                    </div>
                    <span class="texto-elemento-menu">Descubrir</span>
                </a>

                <a href="#" class="elemento-menu">
                    <div class="icono-elemento-menu">
                        <span class="material-icons">group</span>
                    </div>
                    <span class="texto-elemento-menu">Tus grupos</span>
                </a>
            </div>

            <button class="btn-crear-grupo">
                <span class="material-icons">add</span>
                Crear nuevo grupo
            </button>

            <div class="seccion-menu">
                <div class="titulo-seccion-menu">
                    <span>Grupos a los que te uniste</span>
                    <a href="#">Ver todo</a>
                </div>

                <div class="elemento-grupo">
                    <img src="" alt="" class="miniatura-grupo">
                    <div class="info-grupo">
                        <div class="nombre-grupo">nombre del grupo</div>
                        <div class="actividad-grupo">Activo por última vez hace x días</div>
                    </div>
                    <span class="material-icons icono-fijar">push_pin</span>
                </div>

                <div class="elemento-grupo">
                    <img src="" alt="" class="miniatura-grupo">
                    <div class="info-grupo">
                        <div class="nombre-grupo">nombre del grupo</div>
                        <div class="actividad-grupo">Activo por última vez hace x minutos</div>
                    </div>
                </div>

                <div class="elemento-grupo">
                    <img src="" alt="" class="miniatura-grupo">
                    <div class="info-grupo">
                        <div class="nombre-grupo">nombre del grupo</div>
                        <div class="actividad-grupo">Activo por última vez hace x minutos</div>
                    </div>
                </div>

                <div class="elemento-grupo">
                    <img src="" alt="" class="miniatura-grupo">
                    <div class="info-grupo">
                        <div class="nombre-grupo">nombre del grupo</div>
                        <div class="actividad-grupo">Activo por última vez hace x minutos</div>
                    </div>
                </div>

                <div class="elemento-grupo">
                    <img src="" alt="" class="miniatura-grupo">
                    <div class="info-grupo">
                        <div class="nombre-grupo">nombre del grupo</div>
                        <div class="actividad-grupo">Activo por última vez hace x minutos</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="contenido-principal">
            <div class="encabezado-contenido">
                <h2>Actividad reciente</h2>
            </div>

            <div class="tarjeta-publicacion">
                <div class="encabezado-publicacion">
                    <div class="encabezado-publicacion-izquierda">
                        <img src="" alt="" class="avatar-grupo">
                        <div class="info-publicacion">
                            <div class="titulo-grupo">nombre del grupo</div>
                            <div class="metadatos-publicacion">
                                <span>quien lo publico</span>
                                <span>·</span>
                                <span>2 min</span>
                            </div>
                        </div>
                    </div>
                    <div class="opciones-publicacion">
                        <span class="material-icons">more_horiz</span>
                    </div>
                </div>

                <div class="contenido-publicacion">
                    <div class="descripcion-publicacion">
                        Dime qué edad tienes mencionando solo algo tecnológico de tu época:
                    </div>
                    <div class="contenedor-imagen-publicacion">
                        <img src="https://wallpapers.com/images/hd/funny-random-pictures-700-x-933-jsesp7znno7tigcy.jpg" alt="Publicación" class="imagen-publicacion">
                    </div>
                </div>

                <!-- <div class="estadisticas-publicacion">
                    <div class="me-gusta">
                        <div class="icono-me-gusta">👍</div>
                        <span>numero de linke</span>
                    </div>
                    <div class="enlace-comentarios">6 comentarios</div>
                </div> -->

                <div class="acciones-publicacion">
                    <div class="accion-publicacion">
                        <span class="material-icons">thumb_up</span>
                        <span>Me gusta</span>
                    </div>
                    <div class="accion-publicacion">
                        <span class="material-icons">comment</span>
                        <span>Comentar</span>
                    </div>
                    <div class="accion-publicacion">
                        <span class="material-icons">share</span>
                        <span>Compartir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>