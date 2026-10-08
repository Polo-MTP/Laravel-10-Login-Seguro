@extends('layouts.app')

@section('title', 'Login Seguro | Mi Perfil')

@section('content')
    {{-- Page Header --}}
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
        <div>
            <h1>Mi Perfil</h1>
            <p>Información personal asociada a tu cuenta.</p>
        </div>
        <button onclick="window.history.back()" class="btn btn-ghost" style="margin-top: 4px;">
            ← Volver
        </button>
    </div>
    <hr class="page-header-divider" style="margin-bottom: 24px;">

    <div class="card" style="max-width: 600px;">
        <div class="card-title" style="margin-bottom: 6px;">Información Personal</div>
        <div class="card-desc" style="margin-bottom: 20px;">Esta vista es informativa. Los datos provienen de tu sesión activa.</div>

        <div class="profile-field">
            <span class="profile-field-label">Nombre Completo</span>
            <span id="profileName" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Correo Electrónico</span>
            <span id="profileEmail" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Estado de la Cuenta</span>
            <span id="profileStatus" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Fecha de Creación</span>
            <span id="profileCreated" class="profile-field-value">Cargando...</span>
        </div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('js/perfil.js') }}"></script>
@endsection
