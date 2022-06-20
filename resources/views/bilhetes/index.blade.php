<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Admit One Ticket (Aug 2021 #CodePenChallenge)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/css/bilhete.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <div class="user-info">
        <h3>User Photo</h3>
        NAME: {{ $userPhoto->name }}
        <br>
        <img src="  {{ $userPhoto->foto_url ? asset('storage/fotos/' . $userPhoto->foto_url) : asset('images/default_img.png') }}"
            alt="userPhoto" height="100">
    </div>

    <div class="ticket">
        <div class="left">
            <div class="image"
                style="background-image: url('{{ asset('storage/cartazes/' . $filme->cartaz_url) }}')">
                <div class="  ticket-number">
                    <p>
                        ID #{{ $bilhete->id }}
                    </p>
                </div>
            </div>
            <div class="ticket-info">
                <p class="date">
                    <span>{{ date('l', strtotime($session->data)) }}</span>
                    <span class="june-29">{{ date('M d', strtotime($session->data)) }}TH</span>
                    <span>{{ date('Y', strtotime($session->data)) }}</span>
                </p>
                <div class="show-name">
                    <h1>{{ $filme->titulo }}</h1>
                </div>
                <div class="time">
                    <p>{{ $session->data }} <span>AS</span> {{ date('H:i', strtotime($session->horario_inicio)) }}
                    </p>
                    <p>Sala {{ $session->sala_id }} <span>NO</span> posto {{ $bilhete->lugar_id }}</p>
                </div>
                <p class="location"><span>CineMagic</span>
                    <span class="separator"><i class="far fa-smile"></i></span><span>CineMagic</span>
                </p>
            </div>
        </div>
        <div class="right">
            <p class="admit-one">
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
            </p>
            <div class="right-info-container">
                <div class="show-name">
                    <h1>{{ $filme->titulo }}</h1>
                </div>
                <div class="time">
                    <p>{{ $session->data }} <span>AS</span> {{ date('H:i', strtotime($session->horario_inicio)) }}
                    </p>
                    <p>Sala {{ $session->sala_id }} <span>NO</span> posto {{ $bilhete->lugar_id }}</p>
                </div>
                <div class="barcode">
                    {{ $qr = QrCode::size(100)->generate($url . '/bilhete/' . $bilhete->id) }}
                </div>
                <p class="ticket-number">
                    ID #{{ $bilhete->id }}
                </p>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="/js/script.js"></script>

</body>

</html>
