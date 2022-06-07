<style>
    body {
        padding: 50px;
    }

    * {
        box-sizing: border-box;
    }

    .receipt-main {
        display: inline-block;
        width: 100%;
        padding: 15px;
        font-size: 12px;
        border: 1px solid #000;
    }

    .pull-right {
        text-align: right;
    }

    .receipt-title {
        text-align: center;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 600;
        margin: 0;
    }

    .receipt-label {
        font-weight: 600;
    }

    .text-large {
        font-size: 16px;
    }

    .receipt-section {
        margin-top: 10px;
    }

    .receipt-footer {
        text-align: center;
        background: #ff0000;
    }

    .receipt-signature {
        height: 80px;
        margin: 50px 0;
        padding: 0 50px;
        background: #fff;
    }

    .receipt-signature .receipt-line {
        margin-bottom: 10px;
        border-bottom: 1px solid #000;
    }

    .receipt-signature p {
        text-align: center;
        margin: 0;
    }

    .image-right {
        float: left;
        padding-right: 10px;
    }
</style>
<div class="receipt-main">
    <div>
        <img class="image-righ" src="{{ public_path('\images\Cinemagic.png') }}" alt="Cinemagic">
        <span class="receipt-title">Recibo</span>
    </div>

    <div class="pull-right receipt-section valor-section">
        <span class="text-large receipt-label">Data: </span>
        <span class="text-large">{{ $recibo->data }}</span>
        <br>
        <span class="text-large receipt-label">Recibo #: </span>
        <span class="text-large">{{ $recibo->id }}</span>
    </div>

    <div class="receipt-section pull-left">
        <span class="receipt-label text-large">Nome do cliente:</span>
        <span class="text-large">{{ $recibo->nome_cliente }}</span>
        <br>
        <span class="receipt-label text-large">NIF:</span>
        @isset($recibo->nif)
            <span class="text-large">{{ $recibo->nif }}</span>
        @endisset
        <br>
        <span class="receipt-label text-large">Tipo de pagamento:</span>
        <span class="text-large">{{ $recibo->tipo_pagamento }}</span>
    </div>


    <div class="pull-right receipt-section valor-section">
        <span class="text-large receipt-label">Valor sem Iva: </span>
        <span class="text-large">{{ $recibo->preco_total_sem_iva }} €</span>
        <br>
        <span class="text-large receipt-label">Iva: </span>
        <span class="text-large">{{ $recibo->iva }} €</span>
        <br>
        ----------------------------------------
        <br>
        <span class="text-large receipt-label">Valor Total: </span>
        <span class="text-large">{{ $recibo->preco_total_com_iva }} €</span>
    </div>

    <div class="clearfix"></div>

    <div class="receipt-signature col-xs-6">
        <p class="receipt-line"></p>
        <p>{{ $recibo->nome_cliente }}</p>
    </div>
</div>
