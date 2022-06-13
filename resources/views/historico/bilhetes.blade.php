@extends('historico.index')

@section('content-historico')
    <i class="fas fa-fw fa-ticket-alt" style="font-size: 30px"></i>
    <h3 style="display:inline;">Bilhetes válidos</h3>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Filme </th>
                <th scope="col">Sala </th>
                <th scope="col">Lugar</th>
                <th scope="col">Data</th>
                <th scope="col">Horario</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bilhetes as $bilhete)
                <tr>
                    <th scope="row">{{ $bilhete->id }}</th>
                    <td>{{ $filme->titulo }}</td>
                    <td>{{ $session->sala_id }}</td>
                    <td>{{ $bilhete->lugar_id }}</td>
                    <td>{{ $session->data }}</td>
                    <td>{{ $session->horario_inicio }}</td>
                    <td nowrap>
                        <a href="{{ '/bilhete/' . $bilhete->id }}" class="btn btn-primary btn-sm" role="button"
                            aria-pressed="true" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ '/bilhete/' . $bilhete->id . '/pdf' }}" class="btn btn-info btn-sm" role="button"
                            aria-pressed="true" target="_blank">
                            PDF
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <caption>
        {{ $bilhetes->links() }}
    </caption>
@endsection
