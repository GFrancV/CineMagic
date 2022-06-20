<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Filme;
use App\Models\Sessoe;
use App\Models\Bilhete;
use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function index(Request $request){
        $film_id = $request->film_id ?? '';
        $serch= $request->serch ?? '';

        $sessions_aux = Sessoe::where('data', '2020-01-02');

        $sessions = '';
        $salas = '';
        if ($film_id) {
            $sessions = Sessoe::all()->where('filme_id', $film_id);
            $salas = Sala::whereIn('id', $sessions->pluck('sala_id'))->get();
        }

        $select_sesion = '';
        if ($serch) {
            $sala= $request->sala ?? '';
            $horario= $request->horario ?? '';
            $data= $request->data ?? '';

            $select_sesion = Sessoe::all()->where('filme_id', $film_id)->where('sala_id', $sala)
                ->where('horario_inicio', $horario)->where('data', $data);
        }

        $filmes = Filme::whereIn('id', $sessions_aux->pluck('filme_id'))->get();

        return view('acesso.index', ['filmes' => $filmes, 'sessions' => $sessions, 'salas' => $salas, 'select_sesion' => $select_sesion]);
    }

    public function access_control(Request $request, $sessionId){
        $bilhete = $request->bilhete ?? '';
        $type = $request->type ?? '';

        $session = Sessoe::find($sessionId);
        $filme = Filme::find($session->filme_id);

        if ($bilhete) {
            if ($type == 'id' || $type == '') {
                try {
                    $infoBilhete = Bilhete::find($bilhete);
                    if ($infoBilhete->sessao_id == $sessionId) {
                        return view('acesso.control', ['session' => $session, 'infoBilhete' => $infoBilhete ,'filme' => $filme, 'status' => 'show', 'sessionId' => $sessionId]);
                    }
                    else {
                            return view('acesso.control', ['session' => $session, 'filme' => $filme, 'status' => 'error', 'sessionId' => $sessionId]);
                        }
                    } catch (\Throwable $th) {
                    return view('acesso.control', ['session' => $session, 'filme' => $filme, 'status' => 'error', 'sessionId' => $sessionId]);
                }
            }
        }
        return view('acesso.control', ['session' => $session, 'filme' => $filme, 'status' => 'normal', 'sessionId' => $sessionId]);
    }

    public function aceitar_acesso(Request $request, Bilhete $bilhete){
        $bilhete->estado = $request->estado;
        $bilhete->save();

        return redirect('/admin/acesso/' . $request->sessionId )->with('alert-msg', 'Acesso autorizado!')
        ->with('alert-type', 'success');;
    }
}