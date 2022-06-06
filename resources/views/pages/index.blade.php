@extends('layout')

@section('content')
    <br>
    <div class="container">
        <h1>Filmes em Cartaz</h1>
        <br>
        @include('filmes.films', ['filmes' => $filmes])
    </div>
@endsection
