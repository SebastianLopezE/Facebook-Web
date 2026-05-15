<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigos - Facebook</title>
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

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: var(--bg-body);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        .container {
            position: relative;
        }

        .top-nav {
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

        .top-nav-left,
        .top-nav-center,
        .top-nav-right {
            display: flex;
            align-items: center;
        }

        .top-nav-left {
            flex-basis: 360px;
            justify-content: flex-start;
        }

        .fb-logo {
            height: 40px;
            margin-right: 12px;
        }

        .top-nav-right {
            flex-basis: 360px;
            justify-content: flex-end;
        }

        .top-nav-center {
            flex-grow: 1;
            justify-content: center;
            max-width: 700px;
        }

        .search-bar {
            background-color: var(--bg-input);
            border-radius: 20px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }

        .search-bar .material-icons {
            color: var(--text-secondary);
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

        /* mostrar menu de cerrar sesion */
        .menu-desplegable-usuario {
            position: relative;
            display: inline-block;
        }

        .contenido-menu-desplegable {
            display: none;
            position: absolute;
            right: 0;
            top: 48px;
            z-index: 1001;
            min-width: 400px;
            background-color: var(--bg-card);
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border-radius: var(--border-radius);
            padding: 8px 0;
        }

        .contenido-menu-desplegable.mostrar {
            display: block;
        }

        .contenido-menu-desplegable button {
            width: 100%;
            padding: 10px 16px;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contenido-menu-desplegable button:hover {
            background-color: var(--bg-hover);
        }

        .contenido-menu-desplegable .material-icons {
            color: var(--text-secondary);
        }

        .contenido-menu-desplegable .encabezado-perfil {
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--divider);
            margin-bottom: 8px;
            text-decoration: none;
            color: inherit;
        }

        .contenido-menu-desplegable .encabezado-perfil:hover {
            background-color: var(--bg-hover);
            cursor: pointer;
        }

        .contenido-menu-desplegable .encabezado-perfil h3 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .contenido-menu-desplegable .final-menu {
            display: block;
            padding: 12px 16px;
            font-size: 15px;
            color: var(--text-secondary);
            border-top: 1px solid var(--divider);
            margin-top: 8px;
        }

        /* mostrar menu de acceso rapido */
        .menuRapido-desplegable-usuario {
            position: relative;
            display: inline-block;
        }

        .contenido-menuRapido-desplegable {
            display: none;
            position: absolute;
            right: 0;
            top: 48px;
            z-index: 1001;
            min-width: 400px;
            background-color: var(--bg-card);
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            border-radius: var(--border-radius);
            padding: 8px 0;
        }

        .contenido-menuRapido-desplegable.mostrar {
            display: block;
        }

        .contenido-menuRapido-desplegable .search-bar {
            margin: 8px 16px;
            width: auto;
            max-width: 300px;
        }

        .contenido-menuRapido-desplegable .search-bar input {
            width: 220px;
        }

        .nombre-social {
            font-size: 17px;
            font-weight: bold;
            color: black;
            margin: 12px 16px;
        }

        .accesos-social button {
            width: 100%;
            padding: 10px 16px;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .accesos-social button:hover {
            background-color: var(--bg-hover);
        }

        .accesos-social a {
            display: block;
            padding: 10px 16px;
            text-decoration: none;
            color: var(--text-primary);
            font-size: 15px;
            font-weight: 500;
        }

        .accesos-social a:hover {
            background-color: var(--bg-hover);
        }

        .accesos-social .material-icons {
            color: var(--text-secondary);
        }

        /* Main Content */
        .main-content {
            display: flex;
            margin-top: 56px;
            min-height: calc(100vh - 56px);
        }

        /* Sidebar */
        .sidebar {
            width: 360px;
            background-color: #fff;
            padding: 16px 8px;
            position: fixed;
            left: 0;
            top: 56px;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 8px 16px 8px;
        }

        .sidebar-header h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .settings-icon {
            width: 36px;
            height: 36px;
            background-color: #e4e6eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .settings-icon:hover {
            background-color: #d8dadf;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            gap: 12px;
            margin-bottom: 4px;
        }

        .menu-item:hover {
            background-color: #f0f2f5;
        }

        .menu-item.active {
            background-color: #e7f3ff;
        }

        .menu-icon {
            width: 36px;
            height: 36px;
            background-color: #e4e6eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-item.active .menu-icon {
            background-color: #1877f2;
            color: white;
        }

        .menu-text {
            flex: 1;
            font-size: 15px;
            font-weight: 500;
        }

        .menu-arrow {
            color: #65676b;
            font-size: 20px;
        }

        /* Content Area */
        .content-area {
            margin-left: 360px;
            flex: 1;
            padding: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state {
            text-align: center;
            max-width: 500px;
        }

        .empty-state-image {
            width: 112px;
            height: 112px;
            margin: 0 auto 24px;
        }

        .empty-state-text {
            color: #65676b;
            font-size: 17px;
            line-height: 1.3;
        }

        /* Compose Button */
        .compose-button {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .compose-button:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* Icons SVG replacements */
        .icon-svg {
            width: 20px;
            height: 20px;
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
            <div class="nav-link-center active">
                <span class="material-icons">people</span>
            </div>
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

                <!-- menu acceso rapido -->
                <div class="menuRapido-desplegable-usuario" id="menuRapido-desplegable-usuario">
                    <div class="nav-icon" id="boton-abrir-menuRapido">
                        <span class="material-icons">apps</span>
                    </div>
                    <div class="contenido-menuRapido-desplegable" id="contenido-menuRapido">
                        <div class="search-bar">
                            <span class="material-icons" id="barra-buscar-menuRapido">search</span>
                            <input type="text" placeholder="Buscar en Facebook">
                        </div>
                        <div class="nombre-social">Social</div>
                        <div class="accesos-social">
                            <form action="">
                                @csrf
                                <button type="submit">
                                    <span class="material-icons">auto_awesome</span>
                                    Meta AI
                                </button>
                            </form>
                            <div>
                                <a href="">Eventos</a>
                            </div>
                            <div>
                                <a href="">Amigos</a>
                            </div>
                            <div>
                                <a href="">Grupos</a>
                            </div>
                            <div>
                                <a href="">Noticias</a>
                            </div>
                            <div>
                                <a href="">Feed</a>
                            </div>
                            <div>
                                <a href="">Paginas</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="nav-icon">
                    <span class="material-icons">chat</span>
                </div>
                <div class="nav-icon">
                    <span class="material-icons">notifications</span>
                </div>

                <!--  menu del cerrar sesion -->
                <div class="menu-desplegable-usuario" id="menu-desplegable-usuario">
                    <img src="" alt="" class="profile-thumb" id="boton-abrir-menu">
                    <div class="contenido-menu-desplegable" id="contenido-menu">

                        <a class="encabezado-perfil" href="/Perfil_Persona">
                            <img src="" alt="" class="profile-thumb">
                            <h3>{{ Auth::user()->nombre }}</h3>
                        </a>

                        <form method="" action="">
                            @csrf
                            <button type="submit">
                                <span class="material-icons">settings</span>
                                Configuración y privacidad
                            </button>
                        </form>
                        <form method="" action="">
                            @csrf
                            <button type="submit">
                                <span class="material-icons">help</span>
                                Ayuda y soporte técnico
                            </button>
                        </form>
                        <form method="" action="">
                            @csrf
                            <button type="submit">
                                <span class="material-icons">display_settings</span>
                                Pantalla y Privacidad
                            </button>
                        </form>
                        <form method="" action="">
                            @csrf
                            <button type="submit">
                                <span class="material-icons">feedback</span>
                                Enviar comentarios
                            </button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">
                                <span class="material-icons">logout</span>
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Amigos</h1>
                <div class="settings-icon">⚙️</div>
            </div>

            <div class="menu-item active">
                <div class="menu-icon">👥</div>
                <span class="menu-text">Inicio</span>
            </div>

            <div class="menu-item">
                <div class="menu-icon">👤</div>
                <span class="menu-text">Solicitudes de amistad</span>
                <span class="menu-arrow">›</span>
            </div>

            <div class="menu-item">
                <div class="menu-icon">👤</div>
                <span class="menu-text">Sugerencias</span>
                <span class="menu-arrow">›</span>
            </div>

            <div class="menu-item">
                <div class="menu-icon">👤</div>
                <span class="menu-text">Todos los amigos</span>
                <span class="menu-arrow">›</span>
            </div>

            <div class="menu-item">
                <div class="menu-icon">🎁</div>
                <span class="menu-text">Cumpleaños</span>
            </div>

            <div class="menu-item">
                <div class="menu-icon">👤</div>
                <span class="menu-text">Listas personalizadas</span>
                <span class="menu-arrow">›</span>
            </div>
        </aside>

        <main class="content-area">
            <div class="empty-state">
                <div class="empty-state-image">
                    <svg viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="62" cy="32" r="12" fill="#8b9dc3" />
                        <ellipse cx="62" cy="72" rx="18" ry="24" fill="#606770" />
                        <circle cx="38" cy="28" r="8" fill="#bcc0c4" />
                        <ellipse cx="38" cy="58" rx="14" ry="18" fill="#8b9297" />
                        <circle cx="86" cy="38" r="10" fill="#1877f2" />
                        <ellipse cx="86" cy="72" rx="16" ry="20" fill="#4b4f56" />
                    </svg>
                </div>
                <p class="empty-state-text">Cuando tengas solicitudes o sugerencias de amistad, las verás aquí.</p>
            </div>
        </main>
    </div>

    <div class="compose-button">
        <span style="font-size: 24px;">✏️</span>
    </div>

    <script>
        // Menu desplegable de cerrar sesión
        const botonAbrirMenu = document.getElementById('boton-abrir-menu');
        const contenidoMenu = document.getElementById('contenido-menu');

        //abrir menu al hacer click
        botonAbrirMenu.addEventListener('click', (e) => {
            e.stopPropagation();
            contenidoMenu.classList.toggle('mostrar');
        });

        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#menu-desplegable-usuario')) {
                contenidoMenu.classList.remove('mostrar');
            }
        });

        // Menu acceso rapido
        const botonAbrirMenuRapido = document.getElementById('boton-abrir-menuRapido');
        const contenidoMenuRapido = document.getElementById('contenido-menuRapido');

        // Abrir menu al hacer click
        botonAbrirMenuRapido.addEventListener('click', (e) => {
            e.stopPropagation();
            contenidoMenuRapido.classList.toggle('mostrar');
        });

        // Cerrar al hacer click fuera
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#menuRapido-desplegable-usuario')) {
                contenidoMenuRapido.classList.remove('mostrar');
            }
        });
    </script>
</body>

</html>