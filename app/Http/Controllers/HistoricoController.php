<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Recibo;
use App\Models\Sessoe;
use App\Models\Bilhete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricoController extends Controller
{
    public function recibos(){
        $recibos = Recibo::where('cliente_id',Auth::user()->id)->paginate(10);

        return view('historico.recibos', ['recibos' => $recibos]);
    }

    public function bilhetes(){
        $bilhetes = Bilhete::where('cliente_id', Auth::user()->id)->where('estado', 'não usado')->paginate(10);

        if (sizeof($bilhetes) != 0) {
            foreach ($bilhetes as $bl) {
                $bilheteFirst = $bl;
                break;
            }
        }
        else {
            return view('historico.bilhetes', ['bilhetes' => $bilhetes]);
        }

        $session = Sessoe::find($bilheteFirst->sessao_id);
        $filme = Filme::find($session->filme_id);

        return view('historico.bilhetes', ['bilhetes' => $bilhetes, 'filme' => $filme, 'session' => $session]);
    }
}
