@extends('layout_admin')

@section('content')
    @if ($status == 'error')
        @include('partials.alert', [
            'alert_type' => 'danger',
            'alert_msg' =>
                'Bilhete ' .
                app('request')->input('bilhete') .
                ' invalido! Não existe ou não pertence a essa sessão',
        ])
    @endif
    <h3>Sessão {{ $sessionId }}</h3>
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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ app('request')->input('type') == 'id' ? 'active' : '' }}" href="?type=id">ID
                        Bilhete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ app('request')->input('type') == 'qr' ? 'active' : '' }}" href="?type=qr">QR
                        Code</a>
                </li>
            </ul>
            <br>
            <p>Insira os dados:</p>
            <form action="{{ '/admin/acesso/' . $sessionId }}" method="GET">
                <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
                <input type="{{ app('request')->input('type') == 'id' ? 'number' : 'text' }}" class="form-control"
                    name="bilhete" value="{{ old('bilhete') }}" required>
                <br>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Consultar</button>
                </div>
            </form>
            <br>
            @if ($status == 'show')
                <div class="bilhete">
                    @include('bilhetes.pdf', [
                        'bilhete' => $infoBilhete,
                        'session' => $session,
                        'filme' => $filme,
                    ])
                    <br>
                    <form action="{{ route('admin.acesso.acept', ['bilhete' => $infoBilhete]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $infoBilhete->id }}">
                        <input type="hidden" name="estado" value="usado">
                        <input type="hidden" name="sessionId" value="{{ $sessionId }}">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Aceitar</button>
                            <a href="{{ '/admin/acesso/' . $sessionId . '?type=id' }}" class="btn btn-secondary">Não
                                aceitar</a>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <br>
@endsection
