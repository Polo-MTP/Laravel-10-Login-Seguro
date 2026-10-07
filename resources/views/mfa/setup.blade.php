<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Configura Google Authenticator para proteger tu cuenta con MFA.">
    <title>Configurar Autenticador | Login Seguro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('css/mfa-setup.css') }}">
</head>
<body>
    <div class="card">

        {{-- Logo --}}
        <div class="logo">
            <div class="logo-icon">🛡️</div>
            Login Seguro
        </div>
        <p class="subtitle">Configuración de Autenticador · Paso obligatorio</p>

        <h2>Activa tu segundo factor</h2>
        <p>Escanea el código QR con <strong>Google Authenticator</strong> o cualquier app TOTP compatible (Authy, 1Password, etc.).</p>

        {{-- User badge --}}
        <div class="user-badge">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0"/>
            </svg>
            {{ $email }}
        </div>

        {{-- QR Code --}}
        <div class="qr-box">
            {!! $qrImage !!}
        </div>

        <p style="text-align: center; font-size: 12px; color: var(--text-muted); margin-bottom: 10px;">
            ¿Estás desde el celular? Copia la clave secreta manualmente:
        </p>
        <div class="secret" title="Clave secreta TOTP">{{ $secretKey }}</div>

        {{-- Verify Section --}}
        <div class="verify-section">
            <p class="verify-title">Verificar dispositivo</p>
            <p>Ingresa el código de 6 dígitos que muestra tu app para confirmar la configuración:</p>

            <label for="verify_code">Código de verificación</label>
            <input type="text" id="verify_code" maxlength="6" placeholder="000000" autocomplete="one-time-code">

            <div id="status_msg"></div>
        </div>
    </div>

    <script>
        const mfaMethodId = @json($mfaMethodId);
    </script>
    <script src="{{ asset('js/mfa-setup.js') }}"></script>
</body>
</html>
