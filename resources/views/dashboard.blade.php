@extends('layouts.app')

@section('title', 'Login Seguro | Centro de Seguridad')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1 id="welcomeMessage">Centro de Seguridad</h1>
        <p>Administra tu información personal y los ajustes de tu cuenta.</p>
        <hr class="page-header-divider">
    </div>

    {{-- Stats Cards --}}
    <div class="stats-grid">
        <div class="stat-card green">
            <div class="stat-icon green">🛡️</div>
            <div class="stat-value">Activa</div>
            <div class="stat-label">Estado de Cuenta</div>
            <span class="badge badge-success" style="margin-top: 12px;">2 Factores Activos</span>
        </div>

        <div class="stat-card blue">
            <div class="stat-icon blue">💻</div>
            <div class="stat-value">1</div>
            <div class="stat-label">Sesiones Activas</div>
            <a href="#" class="stat-link">Administrar sesiones →</a>
        </div>

        <div class="stat-card purple">
            <div class="stat-icon purple">🕐</div>
            <div class="stat-value">Reciente</div>
            <div class="stat-label">Última Actividad</div>
            <a href="#" class="stat-link">Ver registro completo →</a>
        </div>

        <div class="stat-card orange">
            <div class="stat-icon orange">🔑</div>
            <div class="stat-value">0</div>
            <div class="stat-label">Llaves de Seguridad</div>
            <a href="#" class="stat-link">Configurar FIDO2 →</a>
        </div>
    </div>

    {{-- Session Info --}}
    <div class="card">
        <div class="card-title">Mi Información de Sesión</div>
        <div class="card-desc" style="margin-bottom: 16px;">Datos actuales de tu sesión autenticada en el servidor.</div>
        <div id="apiData" class="data-box">Cargando información de sesión...</div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
