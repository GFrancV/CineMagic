@extends('historico.index')

@section('content-historico')
    <i class="fas fa-fw fa-receipt" style="font-size: 30px"></i>
    <h3 style="display: inline">Recibos</h3>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Pagamento</th>
                <th scope="col">Data</th>
                <th scope="col">Preço sem IVA</th>
                <th scope="col">Preço com IVA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recibos as $recibo)
                <tr>
                    <td>
                        {{ $recibo->id }}
                    </td>
                    <td>
                        {{ $recibo->nome_cliente }}
                    </td>
                    <td>
                        {{ $recibo->tipo_pagamento }}
                    </td>
                    <td>
                        {{ $recibo->data }}
                    </td>
                    <td>
                        {{ $recibo->preco_total_sem_iva }} €
                    </td>
                    <td>
                        {{ $recibo->preco_total_com_iva }} €
                    </td>
                    <td nowrap>
                        <a href="{{ '/recibo/' . $recibo->id }}" class="btn btn-primary btn-sm" role="button"
                            aria-pressed="true" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ '/recibo/' . $recibo->id . '/pdf' }}" class="btn btn-info btn-sm" role="button"
                            aria-pressed="true" target="_blank">
                            PDF
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (sizeof($recibos) == 0)
        <h3 class="text-center"> Não há recibos disponíveis!</h3>
    @endif
    <caption>
        {{ $recibos->links() }}
    </caption>
@endsection
