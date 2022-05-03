@extends('layout')

@section('content')
    <br>
    <div class="container">
        <h1>Filmes</h1>
        <br>
        <div class="row posters">
            @foreach ($filmes as $filme)
                <div class="col-sm-3">
                    <img src="{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" alt="poster">
                    <h3>
                        {{ $filme->titulo }}
                    </h3>
                    <a class="btn btn-primary" href="{{ '/filmes/' . $filme->id }}" role="button">Saber Mais</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
