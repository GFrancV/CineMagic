<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">

        <form action="">
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
            Escolha a sua forma de pagamento:
            <div class="row">
                <div class="col-sm-4">
                    <form action="">
                        <button class="btn-payment-type" type="submit">
                            <img src="/images/icons/payments/visa_payment.svg" alt="visa" height="180vw">
                        </button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="">
                        <button class="btn-payment-type" type="submit">
                            <img src="/images/icons/payments/mbway_payment.png" alt="mbway" height="180vw">
                        </button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="">
                        <button class="btn-payment-type" type="submit">
                            <img src="/images/icons/payments/paypal_payment.png" alt="paypal" height="180vw">
                        </button>
                    </form>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Continuar</button>
        </form>
    </div>
</body>
