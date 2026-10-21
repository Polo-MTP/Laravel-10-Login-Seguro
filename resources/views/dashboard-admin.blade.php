@extends('layouts.app')

@section('title', 'Login Seguro | Panel de Administración')

@section('content')
    {{-- Page Header --}}
    <div class="page-header">
        <h1 id="welcomeMessage">Administración</h1>
        <p>Registro de accesos al sistema.</p>
        <hr class="page-header-divider">
    </div>

    {{-- Audit Log Card --}}
    <div class="card">
        <div class="card-header-row">
            <div>
                <div class="card-title">Inicios de sesión</div>
                <div class="card-desc">Todos los intentos de acceso, del más reciente al más antiguo.</div>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Fecha / hora</th>
                        <th>Usuario</th>
                        <th>IP</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="auditTableBody">
                    <tr>
                        <td colspan="4" class="td-empty">Cargando registros...</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="pagination">
            <div id="paginationInfo" class="pagination-info">Mostrando 0 registros</div>
            <div class="pagination-btns">
                <button id="btnPrevPage" class="btn-page" disabled>Anterior</button>
                <button id="btnNextPage" class="btn-page" disabled>Siguiente</button>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
<script src="{{ asset('js/dashboard-admin.js') }}"></script>
@endsection
