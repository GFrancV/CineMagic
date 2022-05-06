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

        return view('filmes.admin', ['filmes' => $displayFilms]);
    }

    public function show_info($filmeId){
        $filme = Filme::findOrFail($filmeId);
        $sessions = Sessoe::all();
        $sessoesFilme = [];

        foreach ($sessions as $session){
            if ($session->filme_id == $filmeId) {
                array_push($sessoesFilme, $session);
            }
        }

        return view('filmes.film', ['filme' => $filme, 'sessions' => $sessoesFilme]);
    }

    public function admin_index(){
        $filmes = Filme::all();
        dd($filmes);
    }
}
