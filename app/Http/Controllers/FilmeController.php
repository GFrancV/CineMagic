<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(){
        //In the final version use this code!!
        //$sessions = Sessoe::where('data', 'data', date('Y-m-d'));

        //Only for test
        $sessions = Sessoe::where('data', '2020-01-02');

        $filmes = Filme::whereIn('id', $sessions->pluck('filme_id'))->get();
        return view('filmes.index', ['filmes' => $filmes]);
    }

    public function show_info($filmeId){
        $filme = Filme::find($filmeId);
        //In the final version use this code!!
        //$sessoesFilme = Sessoe::where('filme_id', $filmeId)->where('data', date('Y-m-d'))->paginate(10);

        //Only for test
        $sessoesFilme = Sessoe::where('filme_id', $filmeId)->where('data', '2020-01-02')->paginate(10);

        return view('filmes.film', ['filme' => $filme, 'sessions' => $sessoesFilme]);
    }

    public function admin_index(){
        $filmes = Filme::all();
        dd($filmes);
    }
}
