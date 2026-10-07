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
        <span class="badge">Servidor {{ config('app.server_number') }} · Cifrado TLS</span>

        {{-- Alerts --}}
        @if (session('error'))
            <div class="alert alert-error">⚠ {{ session('error') }}</div>
            <div id="alertBox" class="alert hidden"></div>
        @elseif ($errors->any())
            <div class="alert alert-error">⚠ {{ $errors->first() }}</div>
            <div id="alertBox" class="alert hidden"></div>
        @else
            <div id="alertBox" class="alert hidden"></div>
        @endif

        {{-- Step Indicator --}}
        <div class="step-indicator" id="stepIndicator">
            <div class="step-dot active" id="step1">1</div>
            <div class="step-line" id="line1"></div>
            <div class="step-dot" id="step2">2</div>
            <div class="step-line" id="line2"></div>
            <div class="step-dot" id="step3">3</div>
        </div>

        {{-- PASO 1: Credenciales --}}
        <form id="loginForm" class="fade-in" method="POST" action="/api/login" novalidate>
            @csrf
            <div class="form-heading">
                <h2>Bienvenido de vuelta</h2>
                <p>Ingresa tus credenciales para continuar.</p>
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

            <button type="submit" class="btn" id="loginBtn">
                Iniciar Sesión
            </button>

            <a href="/register" class="auth-link">
                ¿Sin cuenta? <span>Regístrate aquí</span>
            </a>
        </form>

        {{-- PASO 2: Google Authenticator --}}
        <form id="mfaForm" class="hidden" method="POST" action="/api/mfa/verify" novalidate>
            @csrf
            <div class="form-heading">
                <h2>Verificación MFA</h2>
                <p>Abre Google Authenticator e ingresa el código de 6 dígitos de tu cuenta.</p>
            </div>

            <div class="form-group">
                <label for="mfa_code">Código de seguridad</label>
                <input type="text" id="mfa_code" class="otp-input" placeholder="000000" maxlength="6" autocomplete="one-time-code">
                <div id="mfaError" class="error-message">Código inválido. Inténtalo de nuevo.</div>
            </div>

            <button type="submit" class="btn" id="mfaBtn">Verificar Identidad</button>
        </form>

        {{-- PASO 3: OTP por Correo --}}
        <form id="emailOtpForm" class="hidden" method="POST" action="/api/mfa/email/verify" novalidate>
            @csrf
            <div class="form-heading">
                <h2>Código por correo</h2>
                <p>Te enviamos un código de 6 dígitos a tu correo electrónico. Revisa tu bandeja de entrada.</p>
            </div>

            <div class="form-group">
                <label for="email_code">Código del correo</label>
                <input type="text" id="email_code" class="otp-input" placeholder="000000" maxlength="6" autocomplete="one-time-code">
                <div id="emailOtpError" class="error-message">Código inválido. Inténtalo de nuevo.</div>
            </div>

            <button type="submit" class="btn" id="emailOtpBtn">Finalizar Inicio de Sesión</button>
        </form>
    </div>

    <script>
        const recaptchaSiteKey = "{{ env('RECAPTCHA_SITE_KEY', '6LfHwwctAAAAALHKhTXYSHFwLqpSQ2_1yUp8tOkq') }}";
    </script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
