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
        <a href="{{ '/recibo/' . $reciboId }}" type="button" class="btn btn-primary">Ver recibo Html </a>
        <a href="{{ '/recibo/' . $reciboId . '/pdf' }}" type="button" class="btn btn-success">Ver recibo PDF</a>
        <a href="{{ '/recibo/' . $reciboId . '/download' }}" type="button" class="btn btn-info">Baixar PDF</a>
    </div>
@endsection
