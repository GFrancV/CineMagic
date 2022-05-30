<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReciboController extends Controller
{
    public function store(ReciboPost $request){
        $validated_info = $request->validated();
        $newRecibo = new Recibo;
        $newRecibo->data = $validated_info['data'];
        $newRecibo->nome = $validated_info['nome'];
        $newRecibo->nif = $validated_info['nif'];
        $newRecibo->tipo_pagamento = $validated_info['tipo_pagamento'];
        $newRecibo->ref_pagamento = $validated_info['ref_pagamento'];
        $newRecibo->tipo = 'D';
        $newRecibo->genero = $validated_info['genero'];
        $newRecibo->password = Hash::make('123');
        if ($request->hasFile('foto')) {
            $path = $request->foto->store('public/fotos');
            $newRecibo->url_foto = basename($path);
        }
        $newRecibo->save();
        $docente = new Docente;
        $docente->user_id = $newRecibo->id;
        $docente->departamento = $validated_info['departamento'];
        $docente->gabinete = $validated_info['gabinete'];
        $docente->extensao = $validated_info['extensao'];
        $docente->cacifo = $validated_info['cacifo'];
        $docente->save();
        return redirect()->route('admin.docentes')
            ->with('alert-msg', 'Docente "' . $validated_info['name'] . '" foi criado com sucesso!')
            ->with('alert-type', 'success');
    }
}
