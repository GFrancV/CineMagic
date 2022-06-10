@isset(Auth::user()->id)
    <div class="container" style="font-size: 20px">
        <form method="POST" action="{{ route('recibo.store') }}" class="form-group" enctype="multipart/form-data">
            @csrf
            <!-- Hidden forms -->
            <!-- Client ID hidden -->
            <input type="hidden" id="cliente_id" name="cliente_id" value="{{ Auth::user()->id }}">
            <!-- To create bilhete -->
            <input type="hidden" name="sessao_id" value="{{ $sessao->id }} ">
            <input type="hidden" name="lugar_id" value="{{ app('request')->input('newLugarId') }} ">
            <input type="hidden" name="nPlaces" value="{{ $nPlaces }} ">

            @error('nif')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <label for="data" class="form-label">Data:</label>
                    <input type="text" class="form-control" id="data" name="data" value="{{ date('Y-m-d', time()) }}"
                        readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label for="nome" class="form-label">Nome cliente: (*)</label>
                    <input type="text" class="form-control" id="nome" name="nome_cliente"
                        value="{{ old('nome_cliente') }}">
                </div>
                <div class="col-sm-4">
                    <label for="nif" class="form-label">NIF:</label>
                    <input type="number" class="form-control @error('nif') is-invalid @enderror" id="nif" name="nif"
                        value="{{ old('nif') }}">
                </div>
            </div>
            <br>
            <h4>
                Forma de pagamento: (*)
            </h4>
            <div class="row">
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="visaPayment" value="VISA">
                        <label class="form-check-label" for="visaPayment">
                            <img src="/images/icons/payments/visa_payment.png" alt="visa" class="">
                        </label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="mbwatPayment" value="MBWAY">
                        <label class="form-check-label" for="mbwatPayment">
                            <img src="/images/icons/payments/mbway_payment.png" alt="mbway" class="">
                        </label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="paypalPayment" value="PAYPAL">
                        <label class="form-check-label" for="paypalPayment">
                            <img src="/images/icons/payments/paypal_payment.png" alt="paypal" class="">
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <h4>
                Informação personal
            </h4>
            <label for="ref_pagamento" class="form-label">Referência de pagamento: (*)</label>
            <input type="text" class="form-control" id="ref_pagamento" name="ref_pagamento"
                value="{{ old('ref_pagamento') }}">
            <!--
                <div class="row">
                    <div class="col-sm-8">
                        <label for="cardNumber" class="form-label">Numero de cartão:</label>
                        <input type="number" class="form-control" id="cardNumber" name="cardNumver" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="CVC" class="form-label">CVC:</label>
                        <input type="number" class="form-control" id="CVC" name="CVC" required>
                    </div>
                </div>
                <br>
                <label for="mbWay" class="form-label">Numero de telemóvel:</label>
                <input type="number" class="form-control" id="mbWay" name="mbWay" required>
                <br>
                <label for="emailPaypal" class="form-label">Email de PayPal:</label>
                <input type="email" class="form-control" id="emailPaypal" name="emailPaypal" required>
                -->
            <br>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-8">
                            <span style="font-weight: bold;">Total sem IVA:</span>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="preco_total_sem_iva" class="input-hide"
                                value="{{ round($nPlaces * $price->preco_bilhete_sem_iva, 2) }}" readonly>
                            <span>€</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <span style="font-weight: bold;">IVA {{ $price->percentagem_iva }}%:</span>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="iva" class="input-hide"
                                value="{{ round($nPlaces * $price->preco_bilhete_sem_iva * $price->percentagem_iva * 0.01, 2) }}"
                                readonly>
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-sm-8">
                            <span style="font-weight: bold;">Total:</span>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="preco_total_com_iva" class="input-hide"
                                value="{{ round($nPlaces * $price->preco_bilhete_sem_iva * (1 + $price->percentagem_iva * 0.01), 2) }}"
                                readonly>
                            €
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <br>
                <button name="ok" class="btn btn-primary btn-lg" type="submit">Continuar</button>
            </div>
        </form>
    </div>
@endisset
