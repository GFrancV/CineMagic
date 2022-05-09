@extends('layout')

@section('content')
    <br>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-3">
                <div class="poster">
                    <img src="{{ asset('storage/cartazes/' . $filme->cartaz_url) }}" alt="poster">
                </div>
            </div>
            <div class="col-sm-9">
                <h1>
                    {{ $filme->titulo }}
                </h1>
                <h3>
                    Sinopse
                </h3>
                <p>
                    {{ $filme->sumario }}
                </p>
                <span class="subtitle">Ano: </span> {{ $filme->ano }}
                <br>
                <span class="subtitle">Género: </span> {{ $filme->genero_code }}
                <br>
                <br>
                <h3>Sessões:</h3>
                @foreach ($sessions as $session)
                    <a href="{{ '/purchase/' . $filme->id . '/' . $session->id }}">
                        <span class="label-blue">
                            {{ date('l d F', strtotime($session->data)) }}
                        </span>
                    </a>
                @endforeach
                <br>
                <br>
                <h3>Trailer:</h3>
                <div>
                    <x-embed url="{{ $filme->trailer_url }}" height="360" />
                </div>
            </div>
        </div>
    </div>
@endsection
