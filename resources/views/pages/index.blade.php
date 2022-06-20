@extends('layout')

@section('content')
    <div class="banner">
        <img src="{{ asset('images/Cinemagic.png') }}" alt="cinemagic">
    </div>
    <div class="container">
        <h1>Filmes em Cartaz</h1>
        <br>
        @include('filmes.films', ['filmes' => $filmes])
    </div>
@endsection
