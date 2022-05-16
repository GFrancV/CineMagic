<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(){
        $sessions = Sessoe::all();
        $displayFilms = [];

        foreach($sessions as $session){
            array_push($displayFilms, Filme::find($session->filme_id));
        }

        return view('filmes.index', ['filmes' => $displayFilms]);
    }

    public function show_info($filmeId){
        $filme = Filme::find($filmeId);
        $sessoesFilme = Sessoe::where('filme_id', $filmeId)->paginate(10);
        $actualData = date('m-d-Y', time());
        $actualTime = date('h:i:s', time());


        return view('filmes.film', ['filme' => $filme, 'sessions' => $sessoesFilme]);
    }

    public function admin_index(){
        $filmes = Filme::all();
        dd($filmes);
    }
}
