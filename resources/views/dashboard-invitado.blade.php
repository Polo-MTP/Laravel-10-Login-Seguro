@extends('layouts.app')

@section('title', 'Login Seguro | Acceso de Invitado')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1>Hola, invitado</h1>
        <p>Tu cuenta tiene acceso limitado.</p>
        <hr class="page-header-divider">
    </div>

    <div class="card" style="max-width: 560px;">
        <div class="card-title">Permisos de invitado</div>
        <p class="card-desc" style="line-height: 1.6; margin-bottom: 14px;">
            Tu cuenta está activa, pero solo puedes ver esta página.
            Si necesitas más acceso, pídeselo al administrador del sistema.
        </p>
        <span class="badge badge-warning">Acceso limitado</span>
    </div>
@endsection
