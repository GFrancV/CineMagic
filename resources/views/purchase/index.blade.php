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
                        <h4> Sessão: </h4>
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
                        @if (app('request')->input('type') != 'payment')
                            <h4>Numero de bilhetes:</h4>
                            <form method="GET" action="{{ '/purchase/' . $filme->id . '/' . $sessao->id }}"
                                class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" type="number" name="nPlaces"
                                            value="{{ $nPlaces }}" min="1" max="5">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary" type="submit">Comprar</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <h4>Lugares:</h4>
                            <p>
                                @if (app('request')->input('nPlaces') > 1)
                                    @for ($i = app('request')->input('newCol'); $i < app('request')->input('nPlaces') + app('request')->input('newCol'); $i++)
                                        {{ app('request')->input('newRow') . $i }},
                                    @endfor
                                @else
                                    {{ app('request')->input('newRow') . app('request')->input('newCol') }}
                                @endif
                            </p>
                        @endif
                        <br>
                    </div>
                </div>
                <div class="row">
                    <!-- Payment info -->
                    @if (app('request')->input('type') == 'payment')
                        <h4>Payment:</h4>
                        @include('partials.payment')
                    @endif
                </div>
            </div>
        </div>
        <br>
        <!-- If is necessary select places -->
        @if ($nPlaces != '' && app('request')->input('type') != 'payment')
            <h4>Escolha o seu lugar: </h4>
            <br>
            <div>
                <form method="GET" action="{{ '/purchase/' . $filme->id . '/' . $sessao->id }}">
                    @include('partials.salas', ['places' => $places, 'cols' => $cols])
                    <br>
                    <input type="hidden" name="newCol" value="{{ app('request')->input('col') }}">
                    <input type="hidden" name="newRow" value="{{ app('request')->input('row') }}">
                    <input type="hidden" name="type" value="payment">
                    <button class="btn btn-primary" type="submit">Continuar</button>
                </form>
            </div>
        @endif
        <br>
    @endsection
