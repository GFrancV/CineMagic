@extends('layout')

@section('content')
    <br>
    <div class="purchase-success">
        </h1>
        <img src="/images/icons/purchase/success_icon.png" alt="check" width="80">
        <h4>
            Compra bem sucedida!
        </h4>
        <h4>O que você quer fazer?</h4>
        <a href="{{ '/recibo/' . $reciboId }}" type="button" class="btn btn-primary" target="_blank">Ver recibo Html </a>
        <a href="{{ '/recibo/' . $reciboId . '/pdf' }}" type="button" class="btn btn-success" target="_blank">Ver recibo
            PDF</a>
        <a href="{{ '/recibo/' . $reciboId . '/download' }}" type="button" class="btn btn-info">Baixar PDF</a>
    </div>
    <br>
    <div class="container">
        <h4>Bilhetes</h4>
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
    </div>
@endsection
