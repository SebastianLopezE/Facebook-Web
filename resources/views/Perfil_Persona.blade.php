<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Facebook</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Variables de color en modo claro (alineadas con Inicio) */
        :root {
            --bg-dark: #f0f2f5;
            /* fondo de página */
            --bg-medium: #ffffff;
            /* tarjetas y barras */
            --bg-light: #f0f2f5;
            /* inputs y fondos suaves */
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

        /* Estilos Globales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
            padding-top: 56px;
        }

        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            font-weight: bold;
            color: var(--text-primary);
        }

        /* Contenedor Principal */
        .container {
            display: flex;
            justify-content: center;
            padding-top: 0;
            /* Ya tenemos padding en el body */
            gap: 24px;
        }

        /* ESTILOS DE BARRA DE NAVEGACIÓN SUPERIOR (Modo claro) */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 56px;
            background-color: var(--bg-medium);
            border-bottom: 1px solid var(--divider);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 0 16px;
            box-sizing: border-box;
        }

        .top-nav-left,
        .top-nav-center,
        .top-nav-right {
            display: flex;
            align-items: center;
        }

        .top-nav-left,
        .top-nav-right {
            flex-basis: 360px;
        }

        .top-nav-left {
            justify-content: flex-start;
        }

        .top-nav-right {
            justify-content: flex-end;
        }

        .top-nav-center {
            flex-grow: 1;
            justify-content: center;
            max-width: 700px;
        }

        .facebook-icon {
            color: var(--blue-fb);
            font-size: 40px;
            margin-right: 16px;
        }

        .search-bar {
            background-color: var(--bg-light);
            border-radius: 20px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }

        .search-bar input {
            background: none;
            border: none;
            color: var(--text-primary);
            margin-left: 8px;
            width: 200px;
        }

        .search-bar input::placeholder {
            color: var(--text-secondary);
        }

        .nav-icon-group {
            display: flex;
            gap: 8px;
        }

        .nav-icon {
            background-color: var(--bg-light);
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

        .nav-link-center {
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

        .nav-link-center:hover {
            background-color: var(--bg-hover);
        }

        .nav-link-center.active {
            border-bottom-color: var(--blue-fb);
        }

        .nav-link-center span.material-icons {
            color: var(--text-secondary);
            font-size: 28px;
        }

        .nav-link-center.active:hover {
            background-color: transparent;
        }

        .nav-link-center.active span.material-icons {
            color: var(--blue-fb);
        }

        .profile-thumb {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            background-color: var(--bg-icon-inactive);
        }

        .fb-logo {
            height: 40px;
            margin-right: 12px;
        }

        .nav-button-right {
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

        .nav-icon.active {
            color: var(--blue-fb);
        }

        .nav-icon span.material-icons {
            color: var(--text-primary);
        }

        .nav-icon.active span.material-icons {
            color: var(--blue-fb);
        }

        /* ---------------------------------------------------------------------- */
        /* ESTILOS DE PERFIL (Integrados del diseño anterior) */
        /* ---------------------------------------------------------------------- */

        .profile-container-wrapper {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            flex-grow: 1;
            /* Permite que este elemento ocupe el espacio central */
        }

        .cover-area {
            background-color: var(--bg-medium);
            border-radius: var(--border-radius);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            margin-top: 16px;
        }

        .cover-photo-placeholder {
            height: 300px;
            /* Ligero degradado claro para portada */
            background: linear-gradient(to right, #e9ebee, #ffffff);
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            padding: 15px;
        }

        .add-cover-photo {
            background-color: var(--bg-light);
            color: var(--text-primary);
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .add-cover-photo span {
            margin-right: 5px;
            font-size: 16px;
        }

        .profile-info-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 0 16px 16px 16px;
            margin-top: -96px;
        }

        .profile-picture-container {
            display: flex;
            align-items: flex-end;
        }

        .profile-picture-placeholder {
            width: 168px;
            height: 168px;
            border-radius: 50%;
            background-color: var(--bg-light);
            border: 4px solid var(--bg-medium);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 80px;
            color: var(--text-secondary);
            margin-right: 16px;
        }

        .profile-name-section h1 {
            font-size: 32px;
            margin-bottom: 5px;
            text-shadow: none;
        }

        .profile-actions {
            display: flex;
            gap: 8px;
        }

        .action-button {
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
        }

        .primary-button {
            background-color: var(--blue-fb);
            color: white;
            border: none;
        }

        .secondary-button {
            background-color: var(--bg-light);
            color: var(--text-primary);
            border: none;
        }

        /* Separador horizontal */
        .separator {
            border: none;
            border-top: 1px solid var(--divider);
            margin: 0;
            background-color: var(--bg-medium);
        }

        /* Barra de Navegación del Perfil */
        .profile-nav-tabs {
            background-color: var(--bg-medium);
            display: flex;
            padding: 0 16px;
            border-bottom: 1px solid var(--divider);
            margin-bottom: 20px;
        }

        .profile-nav-tabs a {
            text-decoration: none;
            color: var(--text-secondary);
            padding: 12px 16px;
            font-weight: 500;
            position: relative;
        }

        .profile-nav-tabs a:hover {
            background-color: var(--bg-light);
            border-radius: 6px;
        }

        .profile-nav-tabs a.active {
            color: var(--blue-fb);
            font-weight: 600;
        }

        .profile-nav-tabs a.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background-color: var(--blue-fb);
            border-radius: 1.5px 1.5px 0 0;
        }

        .profile-nav-tabs .more-options {
            margin-left: auto;
            padding: 12px 16px;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
        }

        /* Contenido de las Columnas del Perfil */
        .content-columns {
            display: flex;
            gap: 20px;
            padding: 0 16px 20px 16px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .left-column {
            flex: 1;
            max-width: 360px;
            min-width: 300px;
        }

        .right-column {
            flex: 2;
            max-width: 620px;
        }

        /* Estilos de Tarjeta General (Dark Mode) */
        .card {
            background-color: var(--bg-medium);
            border-radius: var(--border-radius);
            padding: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Tarjetas de la Columna Izquierda del Perfil */
        .details-card h2 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .detail-button {
            width: 100%;
            background-color: var(--bg-light);
            color: var(--text-primary);
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 500;
            margin-bottom: 8px;
            cursor: pointer;
            text-align: center;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .card-header a {
            text-decoration: none;
            color: var(--blue-fb);
            font-size: 14px;
            font-weight: 500;
        }

        .photo-grid,
        .friend-grid {
            display: grid;
            gap: 8px;
        }

        .photo-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .photo-thumbnail,
        .friend-thumbnail {
            height: 100px;
            background-color: var(--bg-light);
            border-radius: 6px;
        }

        /* Tarjetas de la Columna Derecha del Perfil */
        .add-friends-card {
            text-align: center;
            padding: 20px;
            border: 2px solid var(--divider);
        }

        .add-friends-card .friends-icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: var(--blue-fb);
        }

        .add-friends-card p {
            color: var(--text-secondary);
            font-size: 14px;
            margin: 0;
        }

        /* Creador de Publicación del Perfil */
        .create-post-card {
            padding-bottom: 0;
        }

        .post-input-area {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .profile-picture-placeholder.small {
            width: 40px;
            height: 40px;
            font-size: 20px;
            margin-right: 8px;
            border: none;
        }

        .post-input-area input {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            background-color: var(--bg-light);
            outline: none;
            font-size: 16px;
            cursor: pointer;
            color: var(--text-primary);
        }

        .create-post-card hr {
            border: none;
            border-top: 1px solid var(--divider);
            margin: 10px -16px;
        }

        .post-options {
            display: flex;
            justify-content: space-around;
            padding: 5px 0 10px 0;
        }

        .option-button {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-weight: 500;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.2s;
        }

        .option-button:hover {
            background-color: var(--bg-light);
        }

        .option-button span {
            margin-right: 5px;
            font-size: 18px;
        }

        .live-video span {
            color: #f3425f;
        }

        .photo-video span {
            color: #4bd26a;
        }

        .milestone span {
            color: #f7b928;
        }

        /* Header del Feed de Publicaciones */
        .feed-header-card {
            display: flex;
            flex-direction: column;
        }

        .feed-controls {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-bottom: 10px;
        }

        .control-button {
            background-color: var(--bg-light);
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            color: var(--text-primary);
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .view-options {
            display: flex;
            gap: 20px;
            padding-top: 10px;
        }

        .view-option {
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            font-weight: 600;
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
        }

        .view-option.active {
            color: var(--blue-fb);
            border-bottom: 2px solid var(--blue-fb);
            border-radius: 0;
        }

        /* Publicación de Ejemplo: usa .card para fondo y bordes */

        .post-header {
            display: flex;
            align-items: center;
            padding: 12px 16px;
        }

        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 12px;
            cursor: pointer;
            background-color: var(--bg-icon-inactive);
        }

        .post-info {
            flex-grow: 1;
        }

        .post-info .username {
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            color: var(--text-primary);
        }

        .post-info .username:hover {
            text-decoration: underline;
        }

        .post-info .post-time {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .post-options-menu {
            color: var(--text-secondary);
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
        }

        .post-options-menu:hover {
            background-color: var(--bg-hover);
        }

        .post-content {
            padding: 4px 0 0 0;
            font-size: 15px;
            line-height: 1.5;
        }

        .post-stats {
            display: flex;
            justify-content: space-between;
            padding: 10px 16px;
            font-size: 0.9rem;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--divider);
        }

        .post-stats .likes {
            padding-left: 20px;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0iIzE4NzdmMiIgd2lkdGg9IjE4IiBoZWlnaHQ9IjE4Ij48cGF0aCBkPSJNNy44NTcgMS44NTdDOTEuNjQgMS44NTcgMS42NDMgOS4wTCAuNjQzIDcuODU3YTYuMjE0IDYuMjE0IDAgMCAxIDYuMjE0LTYuMjE0Wk03IC41QzMuNDEuNS41IDMuNDEuNSA3czIuOTEgNi41IDYuNSA2LjUgNi41LTIuOTEgNi41LTYuNVMxMC41OS41IDcgLjVabTIuOTE0IDcuMDRhMS4wNyAxLjA3IDAgMCAwLTEuMjM4LjEzN0w1Ljg5NyA4Ljc0OGEuNTMuNTMgMCAwIDAgLjc1LjE3OGwxLjQyMi0xLjI1MWEuNTI4LjUyOCAwIDAgMCAuMTE3LS43MDYuNTMuNTMgMCAwIDAtLjcwNS0uMTE2bC0yLjIyIDIuMDFhMS4wNyAxLjA3IDAgMCAwLS4xMzcgMS4yMzhsMS45MSAyLjEzOWExLjA3IDEuMTA3IDAgMCAwIDEuMjQuMTM2bDMuNTU4LTIuMzgyYS41My41MyAwIDAgMC0uMTc4LS43NWwtMS4yMDYtLjgzOGEuNTI4LjUyOCAwIDAgMC0uNzA2LjExN2wxLjAwMi43NGMuMDk4LjA3LjE0Ny4yLjExOC4zMTRhLjUyOC41MjggMCAwIDEtLjcwNi4xMTdsLTEuNzgyLTEuMjUxYS41My41MyAwIDAgMCAuNzUtLjE3OGwxLjIxOC0xLjA3NGEuNTI4LjUyOCAwIDAgMC0uMTc4LS43NWwtLjkxNy0uNjQzYS41My41MyAwIDAgMC0uNzUuMTc4bDMuMDkgMi43NGEuNTI4LjUyOCAwIDAgMC0uMTE4LS43MDYuNTMuNTMgMCAwIDAtLjcwNS0uMTE2bC0uMjg3LjI1N2EuNTI4LjUyOCAwIDAgMCAuMTc3Ljc1bDIuODEyLTIuNWExLjA3IDEuMDcgMCAwIDAgLjEzNy0xLjIzOGwtMi41OC0yLjg5MmExLjA3IDEuMDcgMCAwIDAtMS4yMzgtLjEzN0w2LjgxNSA1LjI1YS41My41MyAwIDAgMCAuMTc4Ljc1bDEuMTY0LjgxYS41MjguNTI4IDAgMCAwIC43MDYtLjExN2wtLjgxMy0uNTdhLjUzLjUzIDAgMCAwLS43NDktLjE3OEw0LjUgOC4yMTdhMS4wNyAxLjA3IDAgMCAwLS4xMzcgMS4yMzdsMi43NzMgMy4xYTEuMDcgMS4wNyAwIDAgMCAxLjI0LjEzNmwzLjY0LTIuNDRhLjUzLjUzIDAgMCAwIC4xNzctLjc1bC0xLjEyMy0uNzdhLjUyOC41MjggMCAwIDAgLjExNy43MDYuNTMuNTMgMCAwIDAgLjcwNS4xMTdsMi4xMDQtMS44NjVhLjUzLjUzIDAgMCAwIC4xNzgtLjc1bC0yLjgyNy0xLjk2YS41MjguNTI4IDAgMCAwLS43MDYtLjExN2wxLjIyNi44NWEuNTI4LjUyOCAwIDAgMC0uMTE3LjcwNi41My41MyAwIDAgMCAuNzA1Ljc1WiIgLz48L3N2Zz4=') no-repeat left center;
            background-size: 18px;
        }

        .post-actions {
            display: flex;
            justify-content: space-around;
            padding: 4px 12px;
        }

        .action-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            padding: 8px;
            border-radius: var(--border-radius);
            cursor: pointer;
            color: var(--text-secondary);
            font-weight: bold;
        }

        .action-button:hover {
            background-color: var(--bg-hover);
        }

        .action-button span.material-icons {
            margin-right: 8px;
        }

        .post-content-birthday {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-height: 80px;
            background-color: var(--bg-light);
            border-radius: 6px;
            padding: 10px;
            margin-top: 10px;
        }

        .post-content-birthday .birthday-text {
            font-size: 18px;
            font-weight: normal;
            margin-right: 15px;
        }

        .post-content-birthday .birthday-icon {
            font-size: 40px;
            color: var(--blue-fb);
        }

        /* Media Queries - Mantenidos de tu código */
        @media (max-width: 1300px) {
            .sidebar-right {
                display: none;
            }

            .top-nav-right {
                flex-basis: 200px;
            }
        }

        @media (max-width: 900px) {
            .sidebar-left {
                display: none;
            }

            .top-nav-left {
                flex-basis: 100px;
            }
        }

        @media (max-width: 768px) {
            .top-nav-center {
                display: none;
            }

            .search-bar input {
                display: none;
            }

            .search-bar {
                background-color: var(--bg-icon-inactive);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                padding: 0;
                justify-content: center;
            }

            .facebook-icon {
                margin-right: 8px;
            }

            .nav-button-right {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="top-nav">
        <div class="top-nav-left">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook Logo" class="fb-logo">
            <div class="search-bar">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Buscar en Facebook">
            </div>
        </div>
        <div class="top-nav-center">
            <div class="nav-link-center">
                <a href="{{ route('inicio') }}"><span class="material-icons">home</span></a>
            </div>
            <!--<div class="nav-link-center">
                <span class="material-icons">people</span>
            </div>-->
            <div class="nav-link-center">
                <a href="/vistaVideo"><span class="material-icons">ondemand_video</span></a>
            </div>
            <div class="nav-link-center">
                <a href="{{ route('marketplace') }}"><span class="material-icons">storefront</span></a>
            </div>
            <div class="nav-link-center">
                <a href="{{ route('grupos') }}"><span class="material-icons">groups</span></a>
            </div>
            <div class="nav-link-center">
                <span class="material-icons">gamepad</span>
            </div>
        </div>
        <div class="top-nav-right">
            <div class="nav-button-right">
                Buscar amigos
            </div>
            <div class="nav-icon-group">
                <div class="nav-icon">
                    <span class="material-icons">apps</span>
                </div>
                <div class="nav-icon">
                    <span class="material-icons">chat</span>
                </div>
                <div class="nav-icon">
                    <span class="material-icons">notifications</span>
                </div>
                <div class="">
                    <img src="" alt="" class="profile-thumb">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <main class="profile-container-wrapper">
            <div class="cover-area">
                <div class="cover-photo-placeholder">
                    <button class="add-cover-photo">
                        <span class="material-icons">photo_camera</span> Agregar foto de portada
                    </button>
                </div>
                <div class="profile-info-bar">
                    <div class="profile-picture-container">
                        <div class="profile-picture-placeholder">👤</div>
                        <div class="profile-name-section">
                            @auth
                            <h1>{{ $usuario->nombre }} {{ $usuario->apellido }}</h1>
                            @else
                            <h1>Invitado</h1>
                            @endauth
                        </div>
                    </div>
                    <div class="profile-actions">
                        @Auth
                        @if ($usuario->id === $usuario_actual->id)
                        <button class="action-button primary-button">
                            <span class="material-icons">add</span> Agregar a Historia
                        </button>
                        <button class="action-button secondary-button">
                            <span class="material-icons">edit</span> Editar perfil
                        </button>
                        @else
                        <button class="action-button primary-button">
                            <span class="material-icons">person_add</span> Agregar amigo
                        </button>
                        @endif
                        @endAuth
                    </div>
                </div>
            </div>

            <hr class="separator">

            <nav class="profile-nav-tabs">
                <a href="#" class="active">Publicaciones</a>
                <a href="#">Información</a>
                <a href="#">Amigos</a>
                <a href="#">Fotos</a>
                <a href="#">Reels</a>
                <a href="#">Registros de visitas</a>
                <a href="#">Más <span class="material-icons" style="font-size: 16px;">arrow_drop_down</span></a>
                <span class="more-options"><span class="material-icons">more_horiz</span></span>
            </nav>

            <hr class="separator">

            <div class="content-columns">

                <aside class="left-column">
                    <div class="card details-card">
                        <h2>Detalles</h2>
                        <button class="detail-button">Agregar presentación</button>
                        <button class="detail-button">Editar detalles</button>
                        <button class="detail-button">Agregar destacados</button>
                    </div>

                    <div class="card photos-card">
                        <div class="card-header">
                            <h2>Fotos</h2>
                            <a href="#">Ver todas las fotos</a>
                        </div>
                        <div class="photo-grid">
                            <div class="photo-thumbnail"></div>
                            <div class="photo-thumbnail"></div>
                            <div class="photo-thumbnail"></div>
                            <div class="photo-thumbnail"></div>
                            <div class="photo-thumbnail"></div>
                            <div class="photo-thumbnail"></div>
                        </div>
                    </div>

                    <div class="card friends-card">
                        <div class="card-header">
                            <h2>Amigos</h2>
                            <a href="#">Ver todos los amigos</a>
                        </div>
                        <div class="friend-grid">
                            <div class="friend-thumbnail"></div>
                            <div class="friend-thumbnail"></div>
                            <div class="friend-thumbnail"></div>
                        </div>
                    </div>
                </aside>

                <section class="right-column">

                    <div class="card add-friends-card">
                        <div class="friends-icon">👥</div>
                        <h3>Agrega más amigos para ver recomendaciones</h3>
                        <p>Si agregas más amigos, verás una lista de personas que quizás conozcas aquí.</p>
                    </div>

                    @auth
                    <div class="card create-post-card">
                        <div class="post-input-area">
                            <div class="profile-picture-placeholder small">👤</div>
                            <input type="text" placeholder="¿Qué estás pensando, {{ $usuario->nombre }}?" disabled>
                        </div>
                        <hr>
                        <div class="post-options" style="justify-content:center; color: var(--text-secondary); font-size:14px;">
                            <span>La creación de publicaciones desde aquí se implementará pronto.</span>
                        </div>
                    </div>
                    @endauth

                    <div class="card feed-header-card">
                        <h2>Publicaciones</h2>
                        <div class="feed-controls">
                            <button class="control-button">
                                <span class="material-icons">settings</span> Filtros
                            </button>
                            <button class="control-button">
                                <span class="material-icons">build</span> Administrar publicaciones
                            </button>
                        </div>
                        <hr class="separator" style="margin: 10px 0;">
                        <div class="view-options">
                            <div class="view-option active">
                                <span class="material-icons">list</span> Vista de lista
                            </div>
                            <div class="view-option">
                                <span class="material-icons">grid_view</span> Vista de cuadrícula
                            </div>
                        </div>
                    </div>

                    @auth
                    @if($publicaciones->isEmpty())
                    <div class="card post-card">
                        <div class="post-content-birthday" style="flex-direction: column;">
                            <p class="birthday-text" style="margin-right:0; font-size:16px;">Aún no has publicado nada.</p>
                            <small style="color: var(--text-secondary);">Empieza creando tu primera publicación.</small>
                        </div>
                    </div>
                    @endif
                    @foreach($publicaciones as $publicacion)
                    <div class="card post-card">
                        <div class="post-header">
                            <img src="" alt="">
                            <div class="post-info">
                                @if ($publicacion->user)
                                <a href="{{ route('perfil', ['id' => $publicacion->user->id]) }}" style="text-decoration: none; color: inherit;">
                                    <p class="username">{{ $publicacion->user->nombre }} {{ $publicacion->user->apellido }}</p>
                                </a>
                                @else
                                <p class="username">usuario desconocido</p>
                                @endif
                                <p class="post-time">{{ $publicacion->fecha_publicacion->diffForHumans() }}</p>
                            </div>
                            <span class="material-icons post-options-menu">more_horiz</span>
                            <span class="material-icons post-options-menu">close</span>
                        </div>
                        <div class="post-content">
                            <p style="padding: 12px 16px;">{{ $publicacion->contenido_publicacion }}</p>
                        </div>
                        <div class="post-stats">
                            <span class="likes">N</span>
                            <span class="comments-shares">N comentarios · N veces compartido</span>
                        </div>
                        <div class="post-actions">
                            <div class="action-button">
                                <span class="material-icons">thumb_up</span> Me gusta
                            </div>
                            <div class="action-button">
                                <span class="material-icons">comment</span> Comentar
                            </div>
                            <div class="action-button">
                                <span class="material-icons">share</span> Compartir
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="card post-card">
                        <div class="post-content-birthday" style="flex-direction: column;">
                            <p class="birthday-text" style="margin-right:0; font-size:16px;">Inicia sesión para ver tus publicaciones.</p>
                        </div>
                    </div>
                    @endauth

                </section>
            </div>
        </main>

    </div>
</body>

</html>