@extends('layouts.app')

@section('title', 'Login Seguro | Panel de Administración')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1 id="welcomeMessage">Panel de Administración</h1>
        <p>Auditoría de seguridad y registro de accesos del sistema.</p>
        <hr class="page-header-divider">
    </div>

    {{-- Audit Log Card --}}
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div>
                <div class="card-title">Historial de Inicios de Sesión</div>
                <div class="card-desc">Registro de auditoría con todos los intentos de acceso al sistema.</div>
            </div>
            <span class="badge badge-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="12"/></svg>
                En vivo
            </span>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Fecha / Hora</th>
                        <th>Usuario</th>
                        <th>Dirección IP</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="auditTableBody">
                    <tr>
                        <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 28px;">
                            Cargando registros...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="pagination">
            <div id="paginationInfo" class="pagination-info">Mostrando 0 registros</div>
            <div class="pagination-btns">
                <button id="btnPrevPage" class="btn-page" disabled>← Anterior</button>
                <button id="btnNextPage" class="btn-page" disabled>Siguiente →</button>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('js/dashboard-admin.js') }}"></script>
@endsection
