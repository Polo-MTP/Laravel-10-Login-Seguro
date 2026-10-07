@extends('layouts.app')

@section('title', 'Login Seguro | Acceso de Invitado')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1>Bienvenido, Invitado</h1>
        <p>Tienes acceso limitado al sistema. Contacta a un administrador para ampliar tus permisos.</p>
        <hr class="page-header-divider">
    </div>

    <div class="card" style="max-width: 560px; text-align: center; padding: 48px 40px;">
        <div style="font-size: 52px; margin-bottom: 16px;">👤</div>
        <div class="card-title" style="font-size: 20px; margin-bottom: 10px;">Acceso de Invitado</div>
        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.7; margin-bottom: 24px;">
            Tu cuenta está activa pero con permisos de invitado.<br>
            Para acceder a más funciones, comunícate con el administrador del sistema.
        </p>
        <span class="badge badge-warning" style="font-size: 12px; padding: 6px 16px;">
            Permisos limitados
        </span>
    </div>
@endsection
