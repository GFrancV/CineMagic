<?php

namespace App\Http\Controllers;

use App\Models\Filme;
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
}
