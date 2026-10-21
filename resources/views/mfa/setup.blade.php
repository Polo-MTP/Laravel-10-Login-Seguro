<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Configura Google Authenticator para proteger tu cuenta con MFA.">
    <title>Configurar Autenticador | Login Seguro</title>
    <link rel="stylesheet" href="{{ asset('css/mfa-setup.css') }}">
</head>
<body>
    <div class="card">

        {{-- Logo --}}
        <div class="logo">Login Seguro</div>
        <p class="subtitle">Configuración del autenticador</p>

        <h2>Segundo factor</h2>
        <p>Escanea el código con <strong>Google Authenticator</strong> (o Authy, 1Password, etc.).</p>

        {{-- User badge --}}
        <div class="user-badge">Cuenta: <strong>{{ $email }}</strong></div>

        {{-- QR Code --}}
        <div class="qr-box">
            {!! $qrImage !!}
        </div>

        <p class="hint">¿No puedes escanear? Escribe esta clave en la app:</p>
        <div class="secret" title="Clave secreta TOTP">{{ $secretKey }}</div>

        {{-- Verify Section --}}
        <div class="verify-section">
            <p class="verify-title">Confirmar</p>
            <p>Escribe el código de 6 dígitos que aparece en la app.</p>

            <label for="verify_code">Código</label>
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
