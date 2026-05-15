<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Facebook</title>
    <meta name="description" content="Regístrate en Facebook y busca a tus amigos. Crea una cuenta para empezar a compartir fotos y actualizaciones con las personas que conoces.">
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yx/r/e9sqr8WnkCf.ico">

    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .main-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            padding: 20px;
            width: 432px;
            text-align: center;
        }

        /* ... (el resto de tu CSS está bien, lo he omitido por brevedad) ... */
        .header h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .header p {
            color: #606770;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .divider {
            border-bottom: 1px solid #dadde1;
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .form-row input,
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border-radius: 6px;
            border: 1px solid #dddfe2;
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            color: #606770;
            font-size: 12px;
            font-weight: bold;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        .gender-options {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .gender-option {
            border: 1px solid #dddfe2;
            border-radius: 6px;
            padding: 8px;
            flex-grow: 1;
            text-align: left;
        }

        .gender-option label {
            font-weight: normal;
            display: flex;
            justify-content: space-between;
            width: 100%;
            cursor: pointer;
        }

        .form-info {
            font-size: 11px;
            color: #777;
            margin: 10px 0;
            text-align: left;
        }

        .form-info a {
            color: #385898;
            text-decoration: none;
        }

        .submit-button {
            background-color: #00a400;
            color: #fff;
            padding: 10px 60px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            margin: 10px 0;
        }

        .login-link {
            color: #1877f2;
            font-size: 17px;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }

        .error-message {
            color: #fa3e3e;
            font-size: 13px;
            text-align: left;
            margin-top: 4px;
            width: 100%;
        }

        .input-error {
            border: 1px solid #fa3e3e !important;
        }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="header">
            <h2>Crea una cuenta</h2>
            <p>Es rápido y fácil.</p>
        </div>
        <div class="divider"></div>

        <form method="post" action="/registro">

            @csrf

            <div class="form-row">
                <input type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" required value="{{ old('nombre') }}">
                @error('nombre')
                <div class="error-message">{{ $message }}</div>
                @enderror

                <input type="text" name="apellido" placeholder="Apellido" aria-label="Apellido" required value="{{ old('apellido') }}">
                @error('apellido')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" name="correo" placeholder="Correo electrónico" aria-label="Correo electrónico" required value="{{ old('correo') }}">
                @error('correo')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="contraseña" placeholder="Contraseña nueva" aria-label="Contraseña nueva" required>
                @error('contraseña')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <div class="form-row">
                    <select aria-label="Día" name="birthday_day" title="Día">
                        <option value="1">1</option>
                        <option value="26" selected>26</option>
                    </select>
                    <select aria-label="Mes" name="birthday_month" title="Mes">
                        <option value="1">ene</option>
                        <option value="9" selected>sep</option>
                    </select>
                    <select aria-label="Año" name="birthday_year" title="Año">
                        <option value="2025" selected>2025</option>
                        <option value="1980">1980</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Género</label>
                <div class="gender-options">
                    <div class="gender-option">
                        <label>Mujer <input type="radio" name="sex" value="1"></label>
                    </div>
                    <div class="gender-option">
                        <label>Hombre <input type="radio" name="sex" value="2"></label>
                    </div>
                    <div class="gender-option">
                        <label>Personalizado <input type="radio" name="sex" value="-1"></label>
                    </div>
                </div>
            </div>

            <p class="form-info">Es posible que las personas que usan nuestro servicio...</p>
            <p class="form-info">Al hacer clic en "Registrarte", aceptas nuestras...</p>

            <button type="submit" class="submit-button">Registrarte</button>

            <a href="/InicioSesion" class="login-link">¿Ya tienes una cuenta?</a>
        </form>
    </div>

</body>

</html>