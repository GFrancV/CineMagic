@extends('layout_admin')

@section('content')
    <h3>Controlo de acesso</h3>
    <h5>Selecione o filme ao qual você deseja controlar o acesso: </h5>
    <div class="row mb-3">
        <div class="col-12">
            <form method="GET" action="{{ route('admin.acesso') }}" class="form-group">
                <div class="input-group">
                    <select class="custom-select" name="film_id" id="film_name" aria-label="film_name">
                        <option value="">-- Select filme --</option>
                        @foreach ($filmes as $filme)
                            <option value="{{ $filme->id }}"
                                {{ $filme->id == app('request')->input('film_id') ? 'selected' : '' }}>
                                {{ $filme->titulo }}</option>
                            {{ $filme }}
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (app('request')->input('film_id'))
        <form method="GET" action="{{ route('admin.acesso') }}" class="form-group">
            <input type="hidden" name="film_id" value="{{ app('request')->input('film_id') }}">
            <div class="row">
                <div class="col-sm-12">
                    <label for="sala" class="form-label">Sala:</label>
                    <select class="form-control" id="sala" name="sala" required>
                        <option value="">-- Select sala --</option>
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}"
                                {{ $sala->id == app('request')->input('sala') ? 'selected' : '' }}>
                                {{ $sala->nome }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="sala" class="form-label">Horario:</label>
                    <select class="form-control" id="horario" name="horario" required>
                        <option value="">-- Select horario --</option>
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario }}"
                                {{ $horario == app('request')->input('horario') ? 'selected' : '' }}>
                                {{ $horario }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="data" class="form-label">Data:</label>
                    <select class="form-control" id="data" name="data" required>
                        <option value="">-- Select data --</option>
                        @foreach ($datas as $data)
                            <option value="{{ $data }}"
                                {{ $data == app('request')->input('data') ? 'selected' : '' }}>
                                {{ $data }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <input type="hidden" name="serch" value="true">
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('admin') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @endif
    @if (app('request')->input('serch'))
        <h3>Seleccione a sessão</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($select_sesion as $session_available)
                    <tr>
                        <th>{{ $session_available->id }}</th>
                        <th>{{ $session_available->horario_inicio }}</th>
                        <th>{{ $session_available->data }}</th>
                        <th><a href="{{ '/admin/acesso/' . $session_available->id . '?type=id' }}"
                                class="btn btn-primary btn-sm" role="button" aria-pressed="true">
                                <i class="fas fa-fw fa-qrcode"></i>
                            </a></th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (sizeof($select_sesion) == 0)
            <h3 class="text-center"> Não há sessões disponíveis com essas especificações!</h3>
        @endif
    @endif
@endsection
