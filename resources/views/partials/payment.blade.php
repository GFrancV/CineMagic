    <div class="container" style="font-size: 20px">

        <form method="POST" action="">
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
                    <label for="nome" class="form-label">Nome cliente:</label>
                    <input type="text" class="form-control" id="nome" name="nome_cliente" required>
                </div>
                <div class="col-sm-4">
                    <label for="nif" class="form-label">NIF:</label>
                    <input type="number" class="form-control" id="nif" name="nif">
                </div>
            </div>
            <br>
            <h4>
                Forma de pagamento:
            </h4>
            <div class="row">
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="visaPayment" value="VISA"
                            required>
                        <label class="form-check-label" for="visaPayment">
                            <img src="/images/icons/payments/visa_payment.png" alt="visa" class="">
                        </label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="mbwatPayment" value="MBWAY"
                            required>
                        <label class="form-check-label" for="mbwatPayment">
                            <img src="/images/icons/payments/mbway_payment.png" alt="mbway" class="">
                        </label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <div class="form-check">
                        <input class="input-hidden" type="radio" name="tipo_pagamento" id="paypalPayment"
                            value="PAYPAL" required>
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
            <label for="ref_pagamento" class="form-label">Referência de pagamento:</label>
            <input type="text" class="form-control" id="ref_pagamento" name="ref_pagamento" required>
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
                            <input type="text" class="form-control" id="validationCustomUsername"
                                placeholder="Username" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">€</span>
                            </div>
                            {{ round($nPlaces * 5.5, 4) }}€
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <span style="font-weight: bold;">IVA 23%:</span>
                        </div>
                        <div class="col-sm-4">
                            {{ round($nPlaces * 5.5 * 0.23, 2) }}€
                        </div>
                    </div>
                    <hr class="sidebar-divider my-0">
                    <div class="row">
                        <div class="col-sm-8">
                            <span style="font-weight: bold;">Total:</span>
                        </div>
                        <div class="col-sm-4">
                            {{ round($nPlaces * 5.5 * 1.23, 2) }}€
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <br>
                <button class="btn btn-primary btn-lg" type="submit">Continuar</button>
            </div>
        </form>
    </div>
