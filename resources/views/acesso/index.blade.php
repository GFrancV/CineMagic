@extends('layout_admin')

@section('content')
    <h3>Controlo de acesso</h3>
    <h5>Selecione o filme ao qual você deseja controlar o acesso: </h5>
    <div class="row mb-3">
        <div class="col-3">
        </div>
        <div class="col-9">
            <form method="GET" action="{{ route('admin.acesso') }}" class="form-group">
                <div class="input-group">
                    <select class="custom-select" name="film_name" id="film_name" aria-label="film_name">
                        <option value="s">s</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (app('request')->input('film_name'))
        <form action="">
            <div class="row">
                <div class="col-sm-6">
                    <form action="{{ route('admin.acesso') }}" method="GET">
                        <div class="input-group">
                            <label for="film" class="form-label">Filme:</label>
                            <select class="form-control" id="film" name="film_name">
                                <option> select</option>
                            </select>
                            @if (!app('request')->input('film_name'))
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Selecionar</button>
                                </div>
                        </div>
                    </form>
                @else
                </div>
    @endif
    </div>
    <div class="col-sm-6">
        <form action="{{ route('admin.acesso') }}" method="GET">
            <div class="input-group">
                <label for="sala" class="form-label">Sala:</label>
                <select class="form-control" id="sala" name="sala">
                    <option> select</option>
                </select>
                @if (!app('request')->input('sala'))
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Selecionar</button>
                    </div>
            </div>
        </form>
    @else
    </div>
    @endif
    </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('admin.acesso') }}" method="GET">
                <div class="input-group">
                    <label for="data" class="form-label">Horario:</label>
                    <input class="form-control" type="date" name="data" id="data">
                    @if (!app('request')->input('data'))
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Selecionar</button>
                        </div>
                </div>
            </form>
        @else
        </div>
        @endif
    </div>
    <div class="col-sm-6">
        <form action="{{ route('admin.acesso') }}" method="GET">
            <div class="input-group">
                <label for="sala" class="form-label">Horario:</label>
                <select class="form-control" id="sala" name="horario">
                    <option> select</option>
                </select>
                @if (!app('request')->input('horario'))
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Selecionar</button>
                    </div>
            </div>
        </form>
    @else
    </div>
    @endif
    </div>
    </div>
    <br>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary" name="ok">Save</button>
        <a href="{{ route('admin') }}" class="btn btn-secondary">Cancel</a>
    </div>
    </form>
    @endif
@endsection
