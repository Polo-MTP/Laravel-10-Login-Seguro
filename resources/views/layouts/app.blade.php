<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login Seguro | Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/layout-app.css') }}">
    @yield('extra-css')
</head>
<body>

<div id="app">
    {{-- Navbar --}}
    <nav class="navbar">
        <a href="/dashboard" class="navbar-brand">Login Seguro</a>
        <div class="navbar-actions">
            <a href="/perfil" class="btn btn-ghost">Mi perfil</a>
            <button id="logoutBtn" class="btn btn-danger">Cerrar sesión</button>
        </div>
    </nav>

    {{-- Page content --}}
    <main class="page-wrapper">
        @yield('content')
    </main>
</div>

<script src="{{ asset('js/layout-app.js') }}"></script>
@yield('extra-js')

</body>
</html>
