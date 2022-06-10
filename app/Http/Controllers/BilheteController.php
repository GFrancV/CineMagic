<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use App\Models\Bilhete;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BilheteController extends Controller
{
    public function index(Request $request, $idBilhete){
        $bilhete = Bilhete::find($idBilhete);
        $session = Sessoe::find($bilhete->sessao_id);
        $filme = Filme::find($session->filme_id);

        return view('bilhetes.index', ['bilhete' => $bilhete, 'session' => $session, 'filme' => $filme, 'url' => $request->root()]);
    }

    public function pdf(Request $request, $idBilhete){
        $bilhete = Bilhete::find($idBilhete);
        $session = Sessoe::find($bilhete->sessao_id);
        $filme = Filme::find($session->filme_id);

        $qr = QrCode::generate($request->root() . '/bilhete/' . $bilhete->id, '../public/qrCode/qr' . $idBilhete . '.svg');

        $pdf = PDF::loadView('bilhetes.pdf', ['bilhete' => $bilhete, 'session' => $session, 'filme' => $filme]);

        return $pdf->stream();

    }
}
