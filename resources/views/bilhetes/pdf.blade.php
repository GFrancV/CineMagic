<div class="ticket">
    <div class="left">
        <div class="image">
            <div class="ticket-number">
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
                <p><span>ESTADO:</span> {{ $bilhete->estado }}</p>
            </div>
            <p class="location"><span>CineMagic</span>
                <span class="separator"><i class="far fa-smile"></i></span><span>CineMagic</span>
            </p>
        </div>
        <img src="{{ public_path('\qrCode\qr' . $bilhete->id . '.svg') }}" alt="">
    </div>
</div>
