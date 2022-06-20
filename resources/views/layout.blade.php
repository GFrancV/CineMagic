<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>CineMagic</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/Cinemagic.png" alt="CineMagic" height="64" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item {{ Route::currentRouteName() == 'filmes' ? 'active' : '' }}">
                        <a class="nav-link" aria-current="page" href="/filmes">Em cartaz</a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'filmes.all' ? 'active' : '' }}">
                        <a class="nav-link" aria-current="page" href="/filmes/all">Todos os filmes</a>
                    </li>
                    @isset(Auth::user()->id)
                        @if (Auth::user()->tipo == 'C')
                            <li
                                class="nav-item {{ Route::currentRouteName() == 'historico.recibos' ? 'active' : '' }} {{ Route::currentRouteName() == 'historico.bilhetes' ? 'active' : '' }}">
                                <a class="nav-link" href="/historico/recibos">Historico</a>
                            </li>
                        @endif
                    @endisset
                </ul>

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ '/users/' . Auth::user()->id . '/edit' }}"
                                id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Auth::user()->foto_url ? asset('storage/fotos/' . Auth::user()->foto_url) : asset('images/default_img.png') }}"
                                    height="50px">
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>
