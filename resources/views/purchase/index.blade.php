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
                <div class="row ">
                    <div class="col-sm-6">
                        <br>
                        <h4> Sessaõ: </h4>
                        <p>
                            {{ date('l d F', strtotime($sessao->data)) }} as
                            {{ date('H:i', strtotime($sessao->horario_inicio)) }} horas
                        </p>
                        <br>
                        <h4>Sala: </h4>
                        <p>
                            {{ $sala->nome }}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <h4>Numero de bilhetes:</h4>
                        <form method="GET" action="{{ '/purchase/' . $filme->id . '/' . $sessao->id }}"
                            class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type="number" name="nPlaces" value="{{ $nPlaces }}"
                                        min="1" max="5">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Comprar</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if ($nPlaces != '')
            <h4>Escolha o seu lugar: </h4>
            <br>
            <div>
                @include('partials.salas', ['places' => $places, 'cols' => $cols])
                <br>
                <button class="btn btn-primary" type="submit">Continuar</button>
            </div>
        @endif
        <br>
    @endsection
