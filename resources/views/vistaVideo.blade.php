<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Video</title>
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
            font-family: Arial, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-primary);
        }

        .navegacion-superior {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 56px;
            background-color: #ffffff;
            border-bottom: 1px solid #ced0d4;
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

        .navegacion-superior-derecha {
            flex-basis: 360px;
            justify-content: flex-end;
        }

        .navegacion-superior-centro {
            flex-grow: 1;
            justify-content: center;
            max-width: 700px;
        }

        .logo-fb {
            height: 40px;
            margin-right: 12px;
        }

        .barra-busqueda {
            background-color: #f0f2f5;
            border-radius: 20px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }

        .barra-busqueda .material-icons {
            color: #65676b;
        }

        .barra-busqueda input {
            background: none;
            border: none;
            color: #050505;
            margin-left: 8px;
            width: 200px;
        }

        .barra-busqueda input::placeholder {
            color: #65676b;
        }

        .grupo-iconos-nav {
            display: flex;
            gap: 8px;
        }

        .icono-nav {
            background-color: #e4e6eb;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: #050505;
            font-size: 20px;
            position: relative;
        }

        .boton-nav-derecha {
            background-color: #e7f3ff;
            color: #1877f2;
            font-weight: 600;
            padding: 0 12px;
            height: 36px;
            display: flex;
            align-items: center;
            border-radius: 18px;
            cursor: pointer;
            margin-right: 8px;
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
            border-radius: 8px;
        }

        .enlace-nav-centro:hover {
            background-color: #f0f2f5;
        }

        .enlace-nav-centro.active {
            border-bottom-color: #1877f2;
        }

        .enlace-nav-centro span.material-icons {
            color: #65676b;
            font-size: 28px;
        }

        .enlace-nav-centro.active:hover {
            background-color: transparent;
        }

        .enlace-nav-centro.active span.material-icons {
            color: #1877f2;
        }

        .miniatura-perfil {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            background-color: #e4e6eb;
        }

        /* Sidebar */
        .barra-lateral {
            width: 320px;
            background-color: var(--bg-card);
            position: fixed;
            left: 0;
            top: 56px;
            bottom: 0;
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

        .titulo-barra-lateral {
            font-size: 24px;
            font-weight: bold;
        }

        .icono-configuracion {
            color: #b0b3b8;
            cursor: pointer;
        }

        .caja-busqueda {
            background-color: var(--bg-input);
            border-radius: 20px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .caja-busqueda span {
            color: var(--text-secondary);
            font-size: 15px;
        }

        .elemento-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 4px;
        }

        .elemento-menu:hover {
            background-color: var(--bg-hover);
        }

        .elemento-menu.active {
            background-color: var(--bg-hover);
        }

        .icono-menu {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .elemento-menu.active .icono-menu {
            background-color: var(--blue-fb);
            color: #ffffff;
        }

        .elemento-menu:not(.active) .icono-menu {
            background-color: var(--bg-icon-inactive);
            color: var(--text-primary);
        }

        /* Main Content */
        .contenido-principal {
            margin-top: 56px;
            /* Usamos padding-left igual al ancho del sidebar para no cubrirlo */
            padding: 24px 24px 24px 320px;
            width: 100%;
            box-sizing: border-box;
        }

        .contenedor-feed {
            max-width: 680px;
            margin: 0 auto;
            transform: translateX(-70px);
        }

        .titulo-seccion {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .titulo-seccion span {
            color: var(--text-secondary);
            font-weight: 400;
        }

        /* Post Card */
        .tarjeta-publicacion {
            background-color: var(--bg-card);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
        }

        .encabezado-publicacion {
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .autor-publicacion {
            display: flex;
            gap: 12px;
        }

        .avatar-autor {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #0866ff 0%, #00a8ff 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
            color: white;
        }

        .nombre-autor {
            font-weight: 600;
            font-size: 15px;
            color: var(--text-primary);
        }

        .btn-seguir {
            color: #0866ff;
            font-size: 13px;
            margin-left: 8px;
        }

        .fecha-publicacion {
            font-size: 12px;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 2px;
        }

        .icono-globo {
            width: 12px;
            height: 12px;
            border: 1px solid #b0b3b8;
            border-radius: 50%;
        }

        .btn-mas {
            color: var(--text-secondary);
            font-size: 20px;
            cursor: pointer;
        }

        .texto-publicacion {
            padding: 0 16px 12px;
            font-size: 14px;
            line-height: 1.5;
            color: var(--text-primary);
        }

        .ver-mas {
            color: var(--text-secondary);
            cursor: pointer;
        }

        .miniatura-video {
            width: 100%;
            aspect-ratio: 16/9;
            background: var(--bg-body);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .superposicion-video {
            position: absolute;
            top: 16px;
            right: 16px;
            background: linear-gradient(90deg, #ef4444 0%, #f97316 50%, #facc15 100%);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .icono-editar {
            position: absolute;
            bottom: 16px;
            right: 16px;
            background-color: rgba(0, 0, 0, 0.7);
            width: 32px;
            height: 32px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .sala-reunion {
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #3a3a3a 0%, #2a2a2a 100%);
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .persona {
            background: radial-gradient(circle at 50% 40%, #4a4a4a 0%, #2a2a2a 100%);
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
            <!--<div class="enlace-nav-centro">
                <span class="material-icons">people</span>
            </div>-->
            <div class="enlace-nav-centro active">
                <a href="/vistaVideo"><span class="material-icons">ondemand_video</span></a>
            </div>
            <div class="enlace-nav-centro">
                <a href="{{ route('marketplace') }}"><span class="material-icons">storefront</span></a>
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

    <!-- Sidebar -->
    <div class="barra-lateral">
        <div class="encabezado-barra-lateral">
            <h1 class="titulo-barra-lateral">Video</h1>
            <div class="icono-configuracion">⚙️</div>
        </div>

        <div class="caja-busqueda">
            <span>🔍</span>
            <span>Buscar videos</span>
        </div>

        <div class="elemento-menu active">
            <div class="icono-menu">📹</div>
            <span>Inicio</span>
        </div>
        <div class="elemento-menu">
            <div class="icono-menu">📹</div>
            <span>En vivo</span>
        </div>
        <div class="elemento-menu">
            <div class="icono-menu">🎬</div>
            <span>Reels</span>
        </div>
        <div class="elemento-menu">
            <div class="icono-menu">🚀</div>
            <span>Explorar</span>
        </div>
        <div class="elemento-menu">
            <div class="icono-menu">🔖</div>
            <span>Videos guardados</span>
        </div>
    </div>

    <!-- contenido main -->
    <div class="contenido-principal">
        <div class="contenedor-feed">
            <!-- Post Card -->
            <div class="tarjeta-publicacion">
                <div class="encabezado-publicacion">
                    <div class="autor-publicacion">
                        <div class="avatar-autor">FIA</div>
                        <div>
                            <div>
                                <span class="nombre-autor">Nombre de la pagina</span>
                                <span class="btn-seguir">· Seguir</span>
                            </div>
                            <div class="fecha-publicacion">
                                <span>fecha de publico</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-mas">•••</div>
                </div>

                <div class="texto-publicacion">
                    descripcion de video<span class="ver-mas">Ver más</span>
                </div>

                <div class="miniatura-video">
                    <div class="sala-reunion">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>