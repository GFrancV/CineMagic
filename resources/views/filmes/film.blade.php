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
                <table class="table table-hover">
                    <caption>
                        {{ $sessions->links() }}
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">Dia</th>
                            <th scope="col">Hora</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $session)
                            <tr>
                                <td>
                                    {{ date('l d F', strtotime($session->data)) }}
                                </td>
                                <td>
                                    {{ $session->horario_inicio }}
                                </td>
                                <td>
                                    @if (!is_null(Auth::user()))
                                        @if (Auth::user()->tipo == 'C')
                                            <a href="{{ '/purchase/' . $filme->id . '/' . $session->id }}"
                                                class="btn btn-primary btn-sm" role="button" aria-pressed="true">
                                                <i class="fas fa-money-bill"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ '/purchase/' . $filme->id . '/' . $session->id }}"
                                            class="btn btn-primary btn-sm" role="button" aria-pressed="true">
                                            <i class="fas fa-money-bill"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <br>
                @if (!is_null($filme->trailer_url))
                    <h3>Trailer:</h3>
                    <div>
                        <x-embed url="{{ $filme->trailer_url }}" height="360" />
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
