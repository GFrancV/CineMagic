@extends('layout')

@section('content')
    <br>
    <div class="container">
        <h1>{{ $titulo }}</h1>
        <br>
        @include('filmes.films', ['filmes' => $filmes])
        <br>
        <br>
        @if ($titulo == 'Todos os filmes')
            {{ $filmes->withQueryString()->links() }}
            <br><br>
        @endif
    </div>
@endsection
