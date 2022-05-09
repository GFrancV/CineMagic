@extends('layout')

@section('content')
    <br>
    <div class="container">
        <h1>Comprar bilhetes</h1>
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
                <br>
                <h4> Sessaõ: </h4>
                <p>
                    {{ date('l d F', strtotime($sessao->data)) }}
                </p>
                <br>
                <h4>Numero de bilhetes:</h4>
                <input class="form-control" type="number" value="1" min="1" max="5">
                <br>
                <a class="btn btn-primary" href="" role="button">Comprar bilhete(s)</a>
            </div>
        </div>
    @endsection
