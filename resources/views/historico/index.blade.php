@extends('layout')

@section('content')
    <br>
    <div class="row">
        <div class="col-sm-4">
            <div class="container">
                <ul class="navbar-navsidebar sidebar-light accordion" id="accordionSidebar">
                    <!-- Sidebar - Brand -->
                    <span class="sidebar-brand d-flex align-items-center justify-content-center">
                        <div class="sidebar-brand-text mx-3">
                            <h3>Historico menu</h3>
                        </div>
                    </span>

                    <!-- Nav Item - Dashboard -->
                    <ul class="nav-item {{ Route::currentRouteName() == 'recibos' ? 'active' : '' }}">
                        <a class="nav-link " href="/historico/recibos">
                            <i class="fas fa-fw fa-receipt"></i>
                            <span>Recibos</span>
                        </a>
                    </ul>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Nav Item - Dashboard -->
                    <ul class="nav-item {{ Route::currentRouteName() == 'users' ? 'active' : '' }}">
                        <a class="nav-link" href="/historico/bilhetes">
                            <i class="fas fa-fw fa-ticket-alt"></i>
                            <span>Bilhetes</span>
                        </a>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="container">
                @yield('content-historico')
            </div>
        </div>
    </div>
@endsection
