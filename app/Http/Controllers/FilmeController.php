<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(){
        $filmes = Filme::all();
        return view('filmes.admin', ['filmes' => $filmes]);
    }

    public function show_info($filmeId){
        $filme = Filme::findOrFail($filmeId);
        return view('filmes.film', ['filme' => $filme]);
    }

    public function admin_index(){
        $filmes = Filme::all();
        dd($filmes);
    }
}
