<?php

namespace App\Http\Controllers;

use App\Models\Sessoe;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function index(){
        $sessoes = Sessoe::where('data', '2020-01-02');

        return view('acesso.index', ['sessoes', $sessoes]);
    }
}
