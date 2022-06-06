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
                            <h3>User menu</h3>
                        </div>
                    </span>

                    <!-- Nav Item - Dashboard -->
                    <ul class="nav-item {{ Route::currentRouteName() == 'users' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ '/users/' . Auth::user()->id . '/edit' }}">
                            <i class="fas fa-fw fa-user-alt"></i>
                            <span>Profile</span>
                        </a>
                    </ul>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Nav Item -->
                    <ul class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-fw fa-key"></i>
                            <span>Recuperar Password</span>
                        </a>
                    </ul>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Nav Item -->
                    <ul class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="container">
                <h3>User</h3>
                @yield('user_info')
            </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @endsection
