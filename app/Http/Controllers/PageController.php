<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $sessions = Sessoe::all();
        $displayFilms = [];

        foreach($sessions as $session){
            array_push($displayFilms, Filme::find($session->filme_id));
        }

        return view('pages.index', ['filmes' => $displayFilms]);
    }
}
