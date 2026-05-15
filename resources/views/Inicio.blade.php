<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
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
            /* Azul principal de Facebook */
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
            /* Mantener un tamaño flexible para el lado izquierdo */
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

        .sidebar-left,
        .sidebar-right {
            width: 360px;
            padding: 0px;
            position: fixed;
            top: 56px;
            height: calc(100vh - 56px);
            overflow-y: auto;
            flex-shrink: 0;
        }

        .sidebar-left {
            left: 0;
        }

        .sidebar-right {
            right: 0;
        }

        .sidebar-left::-webkit-scrollbar,
        .sidebar-right::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar-left::-webkit-scrollbar-thumb,
        .sidebar-right::-webkit-scrollbar-thumb {
            background: #bcc0c4;
            border-radius: 4px;
        }

        .sidebar-left,
        .sidebar-right {
            -ms-overflow-style: none;
            scrollbar-width: 20px;
            scrollbar-color: #bcc0c4 transparent;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            margin-bottom: 4px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: background-color 0.2s;
            text-decoration: none;
            color: inherit;
        }

        .sidebar-item:hover {
            background-color: #e4e6eb;
        }

        .sidebar-item img,
        .sidebar-item .icon-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 12px;
            background-color: var(--bg-icon-inactive);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-primary);
            font-size: 20px;
        }

        .sidebar-item .icon-placeholder span.material-icons {
            color: var(--blue-fb);
        }

        .sidebar-item p {
            margin: 0;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar-divider {
            height: 1px;
            background-color: var(--divider);
            margin: 16px 0;
        }

        .sidebar-section-title {
            font-size: 17px;
            font-weight: bold;
            color: var(--text-secondary);
            margin-bottom: 12px;
            padding-left: 12px;
        }

        .see-more-btn {
            background-color: var(--bg-icon-inactive);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 12px;
            font-size: 20px;
            color: var(--text-primary);
        }

        .feed {
            width: 100%;
            max-width: 680px;
            padding-top: 56px;
            padding-bottom: 24px;
            margin: 0 auto;
        }

        .stories-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding-top: 24px;
        }

        .stories-container::-webkit-scrollbar {
            display: none;
        }

        .story-card {
            width: 120px;
            height: 200px;
            border-radius: var(--border-radius);
            background-color: var(--bg-card);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
            box-sizing: border-box;
            cursor: pointer;
            transition: transform 0.2s ease, filter 0.2s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .story-card:hover {
            filter: brightness(0.95);
        }

        .story-card.create-story {
            background-color: var(--bg-card);
            text-align: center;
            justify-content: flex-start;
            padding: 0;
            overflow: visible;
        }

        .story-card.create-story .create-story-top {
            background-color: var(--bg-card);
            height: 70%;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .story-card.create-story .create-story-top img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
        }

        .story-card.create-story .create-story-btn {
            background-color: var(--blue-fb);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid var(--bg-card);
        }

        .story-card.create-story .create-story-btn span {
            color: white;
            font-size: 24px;
        }

        .story-card.create-story .create-story-text {
            height: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            padding-top: 15px;
            color: var(--text-primary);
        }

        .story-card .story-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            filter: brightness(0.9);
        }

        .story-card .story-user-thumb {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 4px solid var(--blue-fb);
            position: relative;
            z-index: 2;
            background-color: var(--bg-icon-inactive);
        }

        .story-card .story-username {
            font-size: 13px;
            font-weight: bold;
            color: white;
            position: relative;
            z-index: 2;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }

        .create-post {
            background-color: var(--bg-card);
            padding: 12px 16px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .post-top {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding-top: 8px;
        }

        .post-top img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--bg-icon-inactive);
        }

        .post-top .status-input {
            flex: 1;
            background-color: var(--bg-input);
            border: none;
            border-radius: 20px;
            padding: 10px 16px;
            color: var(--text-primary);
            margin-left: 8px;
            cursor: pointer;
            font-size: 1.05rem;
            color: var(--text-secondary);
        }

        .post-top .status-input:hover {
            background-color: #e4e6eb;
        }

        .post-card {
            background-color: var(--bg-card);
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

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

        .post-image img {
            width: 100%;
            display: block;
            object-fit: cover;
            background-color: var(--bg-body);
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
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0iIzE4NzdmMiIgd2lkdGg9IjE4IiBoZWlnaHQ9IjE4Ij48cGF0aCBkPSJNNy44NTcgMS44NTdDOTEuNjQgMS44NTcgMS42NDMgOS4wTIDEuNjQzIDcuODU3YTYuMjE0IDYuMjE0IDAgMCAxIDYuMjE0LTYuMjE0Wk03IC41QzMuNDEuNS41IDMuNDEuNSA3czIuOTEgNi41IDYuNSA2LjUgNi41LTIuOTEgNi41LTYuNVMxMC41OS41IDcgLjVabTIuOTE0IDcuMDRhMS4wNyAxLjA3IDAgMCAwLTEuMjM4LjEzN0w1Ljg5NyA4Ljc0OGEuNTMuNTMgMCAwIDAgLjc1LjE3OGwxLjQyMi0xLjI1MWEuNTI4LjUyOCAwIDAgMCAuMTE3LS43MDYuNTMuNTMgMCAwIDAtLjcwNS0uMTE2bC0yLjIyIDIuMDFhMS4wNyAxLjA3IDAgMCAwLS4xMzcgMS4yMzhsMS45MSAyLjEzOWExLjA3IDEuMTA3IDAgMCAwIDEuMjQuMTM2bDMuNTU4LTIuMzgyYS41My41MyAwIDAgMC0uMTc4LS43NWwtMS4yMDYtLjgzOGEuNTI4LjUyOCAwIDAgMC0uNzA2LjExN2wxLjAwMi43NGMuMDk4LjA3LjE0Ny4yLjExOC4zMTRhLjUyOC41MjggMCAwIDEtLjcwNi4xMTdsLTEuNzgyLTEuMjUxYS41My41MyAwIDAgMCAuNzUtLjE3OGwxLjIxOC0xLjA3NGEuNTI4LjUyOCAwIDAgMC0uMTc4LS43NWwtLjkxNy0uNjQzYS41My41MyAwIDAgMC0uNzUuMTc4bDMuMDkgMi43NGEuNTI4LjUyOCAwIDAgMC0uMTE4LS43MDYuNTMuNTMgMCAwIDAtLjcwNS0uMTE2bC0uMjg3LjI1N2EuNTI4LjUyOCAwIDAgMCAuMTc3Ljc1bDIuODEyLTIuNWExLjA3IDEuMDcgMCAwIDAgLjEzNy0xLjIzOGwtMi41OC0yLjg5MmExLjA3IDEuMDcgMCAwIDAtMS4yMzgtLjEzN0w2LjgxNSA1LjI1YS41My41MyAwIDAgMCAuMTc4Ljc1bDEuMTY0LjgxYS41MjguNTI4IDAgMCAwIC43MDYtLjExN2wtLjgxMy0uNTdhLjUzLjUzIDAgMCAwLS43NDktLjE3OEw0LjUgOC4yMTdhMS4wNyAxLjA3IDAgMCAwLS4xMzcgMS4yMzdsMi43NzMgMy4xYTEuMDcgMS4wNyAwIDAgMCAxLjI0LjEzNmwzLjY0LTIuNDRhLjUzLjUzIDAgMCAwIC4xNzctLjc1bC0xLjEyMy0uNzdhLjUyOC41MjggMCAwIDAgLjExNy43MDYuNTMuNTMgMCAwIDAgLjcwNS4xMTdsMi4xMDQtMS44NjVhLjUzLjUzIDAgMCAwIC4xNzgtLjc1bC0yLjgyNy0xLjk2YS41MjguNTI4IDAgMCAwLS43MDYtLjExN2wxLjIyNi44NWEuNTI4LjUyOCAwIDAgMC0uMTE3LjcwNi41My41MyAwIDAgMCAuNzA1Ljc1WiIgLz48L3N2Zz4=') no-repeat left center;
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

        .sidebar-right h3 {
            font-size: 17px;
            color: var(--text-secondary);
            margin-bottom: 12px;
            padding-left: 12px;
        }

        .sidebar-right .sidebar-section-title {
            padding: 4px;
            font-size: 1.05rem;
            font-weight: 600;
        }

        .create-group-chat {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 500;
        }

        .create-group-chat:hover {
            background-color: var(--bg-icon-inactive);
        }

        .create-group-chat .plus-icon-gray {
            width: 36px;
            height: 36px;
            background: var(--bg-icon-inactive);
            color: var(--text-primary);
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 20px;
            font-weight: bold;
            line-height: 1;
            margin-right: 12px;
        }

        @media (max-width: 1300px) {
            .sidebar-right {
                display: none;
            }

            .top-nav-right {
                flex-basis: auto;
            }
        }

        @media (max-width: 900px) {
            .sidebar-left {
                display: none;
            }

            .top-nav-left {
                flex-basis: auto;
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

            .fb-logo {
                display: none;
            }

            .nav-button-right {
                display: none;
            }

            .feed {
                max-width: 100%;
                padding-top: 56px;
            }

            .stories-container {
                padding-top: 12px;
            }
        }

        /* La caja principal del MODAL */
        .post-creator {
            background-color: #ffffff;
            width: 500px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
        }

        /* 1. Encabezado del MODAL */
        .post-creator .post-header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 16px;
            border-bottom: 1px solid #e4e6eb;
            position: relative;
        }

        .post-creator .post-header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .close-button {
            position: absolute;
            right: 16px;
            top: 12px;
            background-color: #e4e6eb;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            cursor: pointer;
            color: #606770;
        }

        .post-body {
            padding: 16px 16px 0 16px;
        }

        .post-body textarea {
            width: 100%;
            height: 100px;
            border: none;
            outline: none;
            resize: none;
            font-size: 1.5rem;
            font-family: Arial, sans-serif;
        }

        .post-body textarea::placeholder {
            color: #606770;
        }

        .add-to-post {
            margin: 16px;
            padding: 12px;
            border: 1px solid #ced0d4;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-to-post span {
            font-weight: bold;
            color: #606770;
        }

        .icons {
            display: flex;
            gap: 8px;
        }

        .icons .material-icons {
            font-size: 24px;
            cursor: pointer;
        }

        /* Estilos base del botón de publicar */
        .publish-button {
            width: calc(100% - 32px);
            margin: 0 16px 16px 16px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
        }

        /* ESTILOS NUEVOS PARA EL MODAL */
        .modal-contenedor {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(240, 242, 245, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal-contenedor.visible {
            display: flex;
        }

        /* ESTILOS NUEVOS PARA EL BOTÓN PUBLICAR */
        .publish-button[disabled] {
            background-color: #e4e6eb;
            color: #bcc0c5;
            cursor: not-allowed;
        }

        .publish-button:not([disabled]) {
            background-color: var(--blue-fb);
            color: #ffffff;
            cursor: pointer;
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
            /* tamaño del menu */
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
            /* para que no subraye el enlace */
            color: inherit;
            /* para que herede el color del texto */
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

        /* para el menu de apps */
        /* --- ESTILOS DEL MENÚ TIPO FACEBOOK (9 PUNTOS) --- */

        .menu-apps-dropdown {
            display: none;
            /* Oculto por defecto */
            position: fixed;
            /* Fijo respecto a la ventana */
            top: 56px;
            right: 20px;
            /* Ajustado a la derecha */
            width: 600px;
            /* Ancho fijo grande */
            height: calc(100vh - 80px);
            /* Casi toda la altura de la pantalla */
            background-color: #f7f8fa;
            /* Un gris muy clarito para el fondo del contenedor */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            z-index: 2000;
            padding: 16px;
            box-sizing: border-box;
            flex-direction: column;
            overflow: hidden;
            /* Para que el scroll sea interno */
        }

        .menu-apps-dropdown.mostrar {
            display: flex;
        }

        .menu-title {
            font-size: 24px;
            margin: 0 0 16px 0;
            color: var(--text-primary);
        }

        .menu-layout {
            display: flex;
            height: 100%;
            gap: 16px;
            overflow: hidden;
        }

        /* Columna Izquierda (Items principales) */
        .menu-col-left {
            flex: 1.8;
            /* Ocupa más espacio (aprox 60%) */
            background-color: var(--bg-card);
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            /* SCROLL AQUÍ */
        }

        /* Columna Derecha (Crear) */
        .menu-col-right {
            flex: 1;
            /* Ocupa menos espacio (aprox 40%) */
            /* La derecha suele ser transparente o fija, aquí la dejaremos simple */
            padding-right: 4px;
            overflow-y: auto;
            /* Scroll si es necesario */
        }

        /* Buscador dentro del menú */
        .menu-search {
            background-color: var(--bg-input);
            border-radius: 20px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .menu-search input {
            border: none;
            background: transparent;
            margin-left: 8px;
            outline: none;
            font-size: 15px;
            width: 100%;
        }

        .menu-section-label {
            font-size: 17px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
            margin-top: 8px;
        }

        /* Items de la izquierda */
        .menu-item {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            text-decoration: none;
            color: inherit;
            transition: background-color 0.2s;
            margin-bottom: 4px;
        }

        .menu-item:hover {
            background-color: var(--bg-hover);
        }

        .menu-item img {
            width: 36px;
            height: 36px;
            margin-right: 12px;
        }

        .menu-item-info h4 {
            margin: 0;
            font-size: 15px;
            color: var(--text-primary);
        }

        .menu-item-info p {
            margin: 0;
            font-size: 13px;
            color: var(--text-secondary);
            line-height: 1.3;
        }

        /* Divider */
        .menu-section-divider {
            height: 1px;
            background-color: var(--divider);
            margin: 12px 0;
        }

        /* Items de la derecha (Crear) */
        .create-item {
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-bottom: 4px;
        }

        .create-item:hover {
            background-color: #e4e6eb;
            /* Hover un poco más oscuro */
        }

        .create-icon-circle {
            width: 36px;
            height: 36px;
            background-color: var(--bg-icon-inactive);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 12px;
        }

        .create-icon-circle .material-icons {
            font-size: 20px;
            color: var(--text-primary);
        }

        .create-item span {
            font-weight: 500;
            font-size: 15px;
            color: var(--text-primary);
        }

        /* Scrollbar personalizada para el menú */
        .menu-col-left::-webkit-scrollbar,
        .menu-col-right::-webkit-scrollbar {
            width: 8px;
        }

        .menu-col-left::-webkit-scrollbar-thumb,
        .menu-col-right::-webkit-scrollbar-thumb {
            background: #bcc0c4;
            border-radius: 4px;
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
            <div class="nav-link-center active">
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

                <!-- <div class="nav-icon">
                    <span class="material-icons">apps</span>
                </div>-->

                <div style="position: relative;">
                    <div class="nav-icon" id="btn-menu-apps">
                        <span class="material-icons">apps</span>
                    </div>

                    <div class="menu-apps-dropdown" id="menu-apps">
                        <h2 class="menu-title">Menú</h2>

                        <div class="menu-layout">
                            <div class="menu-col-left">
                                <div class="menu-search">
                                    <span class="material-icons">search</span>
                                    <input type="text" placeholder="Buscar en el menú">
                                </div>

                                <div class="menu-section-label">Social</div>

                                <a href="#" class="menu-item">
                                    <img src="https://img.icons8.com/color/48/calendar--v1.png" alt="Eventos">
                                    <div class="menu-item-info">
                                        <h4>Eventos</h4>
                                        <p>Organiza o busca eventos.</p>
                                    </div>
                                </a>

                                <a href="#" class="menu-item">
                                    <img src="https://img.icons8.com/color/48/friends--v1.png" alt="Amigos">
                                    <div class="menu-item-info">
                                        <h4>Amigos</h4>
                                        <p>Busca amigos o personas.</p>
                                    </div>
                                </a>

                                <a href="{{ route('grupos') }}" class="menu-item">
                                    <img src="https://img.icons8.com/color/48/groups.png" alt="Grupos">
                                    <div class="menu-item-info">
                                        <h4>Grupos</h4>
                                        <p>Conéctate con intereses.</p>
                                    </div>
                                </a>

                                <a href="#" class="menu-item">
                                    <img src="https://img.icons8.com/fluency/48/news-feed.png" alt="Feeds">
                                    <div class="menu-item-info">
                                        <h4>Feeds</h4>
                                        <p>Mira las publicaciones recientes.</p>
                                    </div>
                                </a>

                                <div class="menu-section-divider"></div>
                                <div class="menu-section-label">Entretenimiento</div>

                                <a href="#" class="menu-item">
                                    <img src="https://img.icons8.com/fluency/48/youtube-play.png" alt="Videos">
                                    <div class="menu-item-info">
                                        <h4>Video</h4>
                                        <p>Destino de video personalizado.</p>
                                    </div>
                                </a>

                                <a href="#" class="menu-item">
                                    <img src="https://img.icons8.com/fluency/48/controller.png" alt="Jugar">
                                    <div class="menu-item-info">
                                        <h4>Jugar</h4>
                                        <p>Juega a tus juegos favoritos.</p>
                                    </div>
                                </a>
                            </div>

                            <div class="menu-col-right">
                                <div class="menu-section-label">Crear</div>

                                <div class="create-item" id="btn-crear-post-menu">
                                    <div class="create-icon-circle"><span class="material-icons">edit</span></div>
                                    <span>Publicación</span>
                                </div>

                                <div class="create-item">
                                    <div class="create-icon-circle"><span class="material-icons">auto_stories</span></div>
                                    <span>Historia</span>
                                </div>

                                <div class="create-item">
                                    <div class="create-icon-circle"><span class="material-icons">movie</span></div>
                                    <span>Reel</span>
                                </div>

                                <div class="menu-section-divider"></div>

                                <div class="create-item">
                                    <div class="create-icon-circle"><span class="material-icons">flag</span></div>
                                    <span>Página</span>
                                </div>

                                <div class="create-item">
                                    <div class="create-icon-circle"><span class="material-icons">groups</span></div>
                                    <span>Grupo</span>
                                </div>
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
                        <!-- <a class="final-menu">
                            <span class=""> Privacidad · Condiciones · Publicidad · Opciones de anuncios · Cookies · Más</span>
                        </a> -->
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container">

        <aside class="sidebar-left">
            <a class="sidebar-item" href="/Perfil_Persona">
                <img src="" alt="">
                <p>{{Auth::user()->nombre}}</p>
            </a>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons" style="color: #008be1;">auto_awesome</span></div>
                <p>Meta AI</p>
            </div>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">group</span></div>
                <p>Amigos</p>
            </div>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">history</span></div>
                <p>Recuerdos</p>
            </div>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons" style="color: #933cde;">bookmark</span></div>
                <p>Guardado</p>
            </div>
            <!-- <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">groups</span></div>
                <p>Grupos</p>
            </div> -->
            <a class="sidebar-item" href="/Grupos">
                <div class="icon-placeholder"><span class="material-icons">groups</span></div>
                <p>Grupos</p>
            </a>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">play_circle_filled</span></div>
                <p>Reels</p>
            </div>
            <!-- <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">storefront</span></div>
                <p>Marketplace</p>
            </div> -->
            <a class="sidebar-item" href="/Marketplace">
                <div class="icon-placeholder"><span class="material-icons">storefront</span></div>
                <p>Marketplace</p>
            </a>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">feed</span></div>
                <p>Feeds</p>
            </div>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons" style="color: #f77239;">event</span></div>
                <p>Eventos</p>
            </div>
            <div class="sidebar-item">
                <div class="icon-placeholder"><span class="material-icons">campaign</span></div>
                <p>Administrador de anuncios</p>
            </div>
            <div class="sidebar-item">
                <div class="see-more-btn"><span class="material-icons">expand_more</span></div>
                <p>Ver más</p>
            </div>
            <div class="sidebar-divider"></div>
            <p class="sidebar-section-title">Tus accesos directos</p>
        </aside>

        <main class="feed">

            <div class="stories-container">
                <div class="story-card create-story">
                    <div class="create-story-top">
                        <img src="" alt="">
                        <div class="create-story-btn">
                            <span class="material-icons">add</span>
                        </div>
                    </div>
                    <div class="create-story-text">Crear historia</div>
                </div>
                <div class="story-card">
                    <img src="" class="story-bg" alt="">
                    <img src="" class="story-user-thumb" alt="">
                    <p class="story-username">USUARIO 1</p>
                </div>
                <div class="story-card">
                    <img src="" class="story-bg" alt="">
                    <img src="" class="story-user-thumb" alt="">
                    <p class="story-username">USUARIO 2</p>
                </div>
                <div class="story-card">
                    <img src="" class="story-bg" alt="">
                    <img src="" class="story-user-thumb" alt="">
                    <p class="story-username">USUARIO 3</p>
                </div>
                <div class="story-card">
                    <img src="" class="story-bg" alt="">
                    <img src="" class="story-user-thumb" alt="">
                    <p class="story-username">USUARIO 4</p>
                </div>
            </div>
            @if (session('status'))
            <div style="background-color: #bcc0c5; color: #2d7e29ff; padding: 1px; border: radis 8px; margin: bottom 20px;">
                {{session('status')}}
            </div>
            @endif
            
            <div class="create-post" id="btn-abrir-modal">
                <div class="post-top" style="margin-bottom: 0; padding-top: 4px;">
                    <img src="" alt="">
                    <div class="status-input">¿Qué estás pensando, {{Auth::user()->nombre}}?</div>
                </div>
            </div>

            <div id="modal-publicacion" class="modal-contenedor">
                <div class="post-creator">
                    <form method="POST" action="{{route('PublicacionInicio')}}">
                        @csrf

                        <div class="post-header">
                            <h2>Crear publicación</h2>
                            <div class="close-button" id="btn-cerrar-modal">&times;</div>
                        </div>
                        <div class="post-body">
                            <textarea id="post-textarea" name="contenido_publicacion" placeholder="¿Qué estás pensando, {{Auth::user()->nombre}}?"></textarea>
                        </div>
                        <div class="add-to-post">
                            <span>Agregar a tu publicación</span>
                            <div class="icons">
                                <i class="material-icons" style="color: #45bd62;">photo_library</i>
                                <i class="material-icons" style="color: #1877f2;">person_add</i>
                                <i class="material-icons" style="color: #f7b928;">sentiment_satisfied_alt</i>
                                <i class="material-icons" style="color: #f5533d;">location_on</i>
                                <i class="material-icons" style="color: #00a400;">gif_box</i>
                            </div>
                        </div>
                        <button type="submit" class="publish-button" id="btn-publicar" disabled>Publicar</button>
                    </form>
                </div>
            </div>

            @foreach ($publicaciones as $publicacion)
            <div class="post-card">
                <div class="post-header">
                    <img src="" alt="">
                    <div class="post-info">
                        @if ($publicacion->user)
                        <a href="{{ route('perfil', ['id' => $publicacion->user->id]) }}" style="text-decoration: none; color: inherit;">
                            <p class="username">{{$publicacion->user->nombre}} {{$publicacion->user->apellido}}</p>
                        </a>
                        @else
                        <p class="username">usuario desconocido</p>
                        @endif
                        <p class="post-time">{{$publicacion->fecha_publicacion->diffForHumans()}}</p>
                    </div>
                    <span class="material-icons post-options-menu">more_horiz</span>
                    <span class="material-icons post-options-menu">close</span>
                </div>
                <div class="post-content">
                    <p style="padding: 12px 16px;">{{$publicacion->contenido_publicacion}}</p>
                </div>

                <div class="post-stats">
                    <span class="likes">N</span>
                    <span class="comments-shares">N comentarios · N veces compartido</span>
                </div>

                <div class="post-actions">
                    <div class="action-button">
                        <span class="material-icons">thumb_up</span> Me gusta
                    </div>
                    <div class="action-button btn-comentar" data-publicacion-id="{{$publicacion->id_publicacion}}">
                        <span class="material-icons">comment</span> Comentar
                    </div>
                    <div class="action-button">
                        <span class="material-icons">share</span> Compartir
                    </div>
                </div>
                <!-- Formulario de comentario oculto -->
                <form class="form-comentario" style="display:none; margin: 10px 16px;" data-publicacion-id="{{$publicacion->id_publicacion}}">
                    @csrf
                    <input type="hidden" name="id_publicacion" value="{{$publicacion->id_publicacion}}">
                    <input type="text" name="contenido_comentario" placeholder="Escribe un comentario..." style="width:70%; padding:8px; border-radius:6px; border:1px solid #ccc;">
                    <button type="button" style="padding:8px 16px; border-radius:6px; background:#1877f2; color:#fff; border:none;">Enviar</button>
                </form>
            </div>
            @endforeach
        </main>

        <aside class="sidebar-right">

            <p class="sidebar-section-title">Chats en grupo</p>

            <a href="#" class="create-group-chat">
                <div class="plus-icon-gray">+</div>
                <span>Crear chat en grupo</span>
            </a>

        </aside>
    </div>

    <script>
        const btnAbrir = document.getElementById('btn-abrir-modal');
        const btnCerrar = document.getElementById('btn-cerrar-modal');
        const modal = document.getElementById('modal-publicacion');

        function abrirModal() {
            modal.classList.add('visible');
        }

        function cerrarModal() {
            modal.classList.remove('visible');
        }

        btnAbrir.addEventListener('click', abrirModal);
        btnCerrar.addEventListener('click', cerrarModal);

        modal.addEventListener('click', (evento) => {
            if (evento.target === modal) {
                cerrarModal();
            }
        });

        const postTextarea = document.getElementById('post-textarea');
        const btnPublicar = document.getElementById('btn-publicar');

        postTextarea.addEventListener('input', () => {
            const texto = postTextarea.value.trim();
            if (texto.length > 0) {
                btnPublicar.disabled = false;
            } else {
                btnPublicar.disabled = true;
            }
        });

        // Menu desplegable de cerrar sesión
        const botonAbrirMenu = document.getElementById('boton-abrir-menu');
        const contenidoMenu = document.getElementById('contenido-menu');

        //abrir menu a l hacer click
        botonAbrirMenu.addEventListener('click', (e) => {
            e.stopPropagation();
            contenidoMenu.classList.toggle('mostrar');
        });

        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!e.target.closest('cerrar-menu')) {
                contenidoMenu.classList.remove('mostrar');
            }
        });


        // Menu de apps 

        // --- LÓGICA PARA EL MENÚ DE APPS (9 PUNTOS) ---
        const btnMenuApps = document.getElementById('btn-menu-apps');
        const menuApps = document.getElementById('menu-apps');
        // Reutilizamos la variable del otro menú si ya existe, si no, la declaramos
        const menuUsuario = document.getElementById('contenido-menu');

        btnMenuApps.addEventListener('click', (e) => {
            e.stopPropagation();

            // Si el menú de usuario está abierto, ciérralo
            if (menuUsuario && menuUsuario.classList.contains('mostrar')) {
                menuUsuario.classList.remove('mostrar');
            }

            // Toggle del menú apps
            menuApps.classList.toggle('mostrar');

            // Opcional: Toggle visual de activo en el icono
            btnMenuApps.classList.toggle('active');
        });

        // Cerrar al hacer clic fuera
        document.addEventListener('click', (e) => {
            // Si el clic NO fue dentro del menú apps Y NO fue en el botón
            if (!menuApps.contains(e.target) && !btnMenuApps.contains(e.target)) {
                menuApps.classList.remove('mostrar');
                btnMenuApps.classList.remove('active');
            }
        });

        // ACCIÓN RÁPIDA: Abrir modal de crear publicación desde el menú
        const btnCrearPostMenu = document.getElementById('btn-crear-post-menu');
        if (btnCrearPostMenu) {
            btnCrearPostMenu.addEventListener('click', () => {
                menuApps.classList.remove('mostrar'); // Cerrar el menú
                abrirModal(); // Llamar a tu función existente de abrir modal
            });
        }
    </script>
    <script>
        // Mostrar formulario al pulsar Comentar
        document.querySelectorAll('.btn-comentar').forEach(btn => {
            btn.addEventListener('click', function() {
                const pubId = btn.getAttribute('data-publicacion-id');
                const form = document.querySelector(`.form-comentario[data-publicacion-id='${pubId}']`);
                if (form) {
                    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
                }
            });
        });
    </script>
</body>

</html>|