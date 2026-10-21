<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Inicia sesión de forma segura con autenticación multifactor.">
    <title>Iniciar Sesión | Login Seguro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY', '6LfHwwctAAAAALHKhTXYSHFwLqpSQ2_1yUp8tOkq') }}"></script>
</head>
<body>

    <div class="login-container" id="app">

        {{-- Logo & Badge --}}
        <div class="logo">Login Seguro</div>
        <span class="badge">Servidor {{ config('app.server_number') }}</span>

        {{-- Alerts --}}
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
            <div id="alertBox" class="alert hidden"></div>
        @elseif ($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
            <div id="alertBox" class="alert hidden"></div>
        @else
            <div id="alertBox" class="alert hidden"></div>
        @endif

        {{-- PASO 1: Credenciales --}}
        <form id="loginForm" method="POST" action="/api/login" novalidate>
            @csrf
            <div class="form-heading">
                <span class="step-label">Paso 1 de 3</span>
                <h2>Iniciar sesión</h2>
                <p>Entra con tu correo y contraseña.</p>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" placeholder="tu@correo.com" autocomplete="email">
                <div id="emailError" class="error-message">Introduce un correo válido.</div>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="••••••••" autocomplete="current-password">
                <div id="passwordError" class="error-message">La contraseña es requerida.</div>
            </div>

            <button type="submit" class="btn" id="loginBtn">Continuar</button>

            <a href="/register" class="auth-link">
                ¿No tienes cuenta? <span>Crear una</span>
            </a>
        </form>

        {{-- PASO 2: Google Authenticator --}}
        <form id="mfaForm" class="hidden" method="POST" action="/api/mfa/verify" novalidate>
            @csrf
            <div class="form-heading">
                <span class="step-label">Paso 2 de 3</span>
                <h2>Código del autenticador</h2>
                <p>Abre Google Authenticator y escribe el código de 6 dígitos.</p>
            </div>

            <div class="form-group">
                <label for="mfa_code">Código de seguridad</label>
                <input type="text" id="mfa_code" class="otp-input" placeholder="000000" maxlength="6" autocomplete="one-time-code">
                <div id="mfaError" class="error-message">Código inválido. Inténtalo de nuevo.</div>
            </div>

            <button type="submit" class="btn" id="mfaBtn">Verificar</button>
        </form>

        {{-- PASO 3: OTP por Correo --}}
        <form id="emailOtpForm" class="hidden" method="POST" action="/api/mfa/email/verify" novalidate>
            @csrf
            <div class="form-heading">
                <span class="step-label">Paso 3 de 3</span>
                <h2>Código por correo</h2>
                <p>Te mandamos un código de 6 dígitos. Si no aparece, revisa spam.</p>
            </div>

            <div class="form-group">
                <label for="email_code">Código del correo</label>
                <input type="text" id="email_code" class="otp-input" placeholder="000000" maxlength="6" autocomplete="one-time-code">
                <div id="emailOtpError" class="error-message">Código inválido. Inténtalo de nuevo.</div>
            </div>

            <button type="submit" class="btn" id="emailOtpBtn">Entrar</button>
        </form>
    </div>

    <script>
        const recaptchaSiteKey = "{{ env('RECAPTCHA_SITE_KEY', '6LfHwwctAAAAALHKhTXYSHFwLqpSQ2_1yUp8tOkq') }}";
    </script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
