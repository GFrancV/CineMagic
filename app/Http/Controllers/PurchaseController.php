<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Filme;
use App\Models\Lugare;
use App\Models\Sessoe;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class PurchaseController extends Controller
{
    public function index(Request $request, $filmeId, $sessionId){
        $filme = Filme::findOrFail($filmeId);
        $session = Sessoe::findOrFail($sessionId);
        $sala = Sala::findOrFail($session->sala_id);

        $nPlaces = $request->nPlaces ?? '';

        if ($nPlaces) {
            $cols = Lugare::all()->where('sala_id', $sala->id)->max('posicao');
            $places = Lugare::all()->where('sala_id', $sala->id);
        }
        else{
            $cols = '';
            $places = '';
        }

        //Ff the session is not the one of the movie it returns to the index
        if ($filme->id != $session->filme_id) {
            return redirect('/');
        }

        return view('purchase.index',  ['filme' => $filme, 'sessao' => $session, 'sala' => $sala,
            'places' => $places, 'cols' => $cols, 'nPlaces' => $nPlaces]);
    }

    public function selec_places(Request $request){
        $places = $request->places ?? '';

        return view('purchase.places', ['places' => $places]);
    }

    //test function
    public function draw(){

        return view('partials.payment');
    }
}
