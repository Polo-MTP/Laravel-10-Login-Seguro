@extends('layouts.app')

@section('title', 'Login Seguro | Centro de Seguridad')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1 id="welcomeMessage">Centro de seguridad</h1>
        <p>Resumen de tu cuenta y de la sesión actual.</p>
        <hr class="page-header-divider">
    </div>

    {{-- Stats --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Cuenta</div>
            <div class="stat-value">Activa</div>
            <span class="badge badge-success">2 factores</span>
        </div>

        <div class="stat-card">
            <div class="stat-label">Sesiones</div>
            <div class="stat-value">1</div>
            <a href="#" class="stat-link">Administrar</a>
        </div>

        <div class="stat-card">
            <div class="stat-label">Última actividad</div>
            <div class="stat-value">Reciente</div>
            <a href="#" class="stat-link">Ver registro</a>
        </div>

        <div class="stat-card">
            <div class="stat-label">Llaves físicas</div>
            <div class="stat-value">0</div>
            <a href="#" class="stat-link">Configurar FIDO2</a>
        </div>
    </div>

    {{-- Session Info --}}
    <div class="card">
        <div class="card-title">Datos de la sesión</div>
        <div class="card-desc" style="margin-bottom: 14px;">Lo que devuelve el servidor para tu usuario autenticado.</div>
        <div id="apiData" class="data-box">Cargando...</div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
