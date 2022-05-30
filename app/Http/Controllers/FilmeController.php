<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(){
        //$sessions = Sessoe::where('data', now());
        $sessions = Sessoe::where('data', '2020-01-02');

        $filmes = Filme::whereIn('id', $sessions->pluck('filme_id'))->get();
        return view('filmes.index', ['filmes' => $filmes]);
    }

    public function show_info($filmeId){
        $filme = Filme::find($filmeId);
        $sessoesFilme = Sessoe::where('filme_id', $filmeId)->paginate(10);

        return view('filmes.film', ['filme' => $filme, 'sessions' => $sessoesFilme]);
    }

    public function admin_index(){
        $filmes = Filme::all();
        dd($filmes);
    }
}
