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
                    </div>
                    <div class="col-sm-6">
                        <h4>Numero de bilhetes:</h4>
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="number" value="1" min="1" max="5">
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="" role="button">Comprar</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <br>
                <h1>Selecionar o posto:</h1>
                <br>
            </div>
        </div>
    @endsection
