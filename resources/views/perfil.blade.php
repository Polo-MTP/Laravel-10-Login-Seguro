@extends('layouts.app')

@section('title', 'Login Seguro | Mi Perfil')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1>Mi perfil</h1>
        <p>Datos de tu cuenta. Solo lectura.</p>
        <hr class="page-header-divider">
    </div>

    <div class="card" style="max-width: 640px;">
        <div class="profile-field">
            <span class="profile-field-label">Nombre</span>
            <span id="profileName" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Correo electrónico</span>
            <span id="profileEmail" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Estado</span>
            <span id="profileStatus" class="profile-field-value">Cargando...</span>
        </div>

        <div class="profile-field">
            <span class="profile-field-label">Miembro desde</span>
            <span id="profileCreated" class="profile-field-value">Cargando...</span>
        </div>
    </div>

    <button onclick="window.history.back()" class="btn btn-ghost" style="margin-top: 16px;">Volver</button>
@endsection

@section('extra-js')
<script src="{{ asset('js/perfil.js') }}"></script>
@endsection
