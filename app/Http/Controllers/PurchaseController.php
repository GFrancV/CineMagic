<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Lugare;
use App\Models\Sessoe;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class PurchaseController extends Controller
{
    public function index($filmeId, $sessionId){
        $filme = Filme::findOrFail($filmeId);
        $session = Sessoe::findOrFail($sessionId);

        //Ff the session is not the one of the movie it returns to the index
        if ($filme->id != $session->filme_id) {
            return redirect('/');
        }

        return view('purchase.index',  ['filme' => $filme, 'sessao' => $session]);
    }

    //test function
    public function draw($idSala){
        $places = Lugare::all()->where('sala_id', $idSala);

        $rows = Lugare::all()->where('sala_id', $idSala)->max('fila');
        $cols = Lugare::all()->where('sala_id', $idSala)->max('posicao');

        return view('partials.salas', ['places' => $places, 'rows' => $rows, 'cols' => $cols]);
    }
}
