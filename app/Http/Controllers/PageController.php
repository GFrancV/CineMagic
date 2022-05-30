<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Sessoe;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $sessions = Sessoe::where('data', '2020-01-02');

        $filmes = Filme::whereIn('id', $sessions->pluck('filme_id'))->get();

        return view('pages.index', ['filmes' => $filmes]);
    }
}
